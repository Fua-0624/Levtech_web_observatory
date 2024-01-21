import axios from "axios";
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

function formatDate(date, pos){
    var dt = new Date(date);
    if(pos==="end"){
        dt.setDate(dt.getDate() - 1);
    }
    return dt.getFullYear() + '-' + ('0' + (dt.getMonth()+1)).slice(-2) + '-' + ('0' + dt.getDate()).slice(-2);
}

//calendarのidを持つ要素をcalendarElに入れる
var calendarEl = document.getElementById("calendar");

//以下の処理がcalendarElがnullじゃないと動かないようif文を使う
if(calendarEl !== null ){
    let calendar = new Calendar(calendarEl,{
        plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin],
        initialView: "dayGridMonth",  //カレンダーが開かれたとき、最初は月ごとの表示にしておく
        //予定を追加するボタンの設置と、クリックした時の処理
        //新しいボタンを設定したかったらcustomButtonsで設定する(FullCalendarに備わっている機能)
        customButtons: { // カスタムボタン
            eventAddButton: { // 新規予定追加ボタン
                text: '予定を追加',
                click: function() {
                    // 初期化（以前入力した値をクリアする）
                    document.getElementById("new-id").value = "";
                    document.getElementById("new-event_title").value = "";
                    document.getElementById("new-start_date").value = "";
                    document.getElementById("new-end_date").value = "";
                    document.getElementById("new-event_body").value = "";
                    document.getElementById("new-event_color").value = "blue";
    
                    // 新規予定追加モーダルを開く
                    document.getElementById('modal-add').style.display = 'flex';
                }
            }
        },
        //ヘッダーの設定：ヘッダーに表示させたいものを記入する(start->左側、center->真ん中、end->右側)
        headerToolbar: {
            start: "prev,next today",
            center: "title",
            end: "eventAddButton dayGridMonth,timeGridWeek",
        },
        height: "auto",
        
        //日程指定で新規予定追加
        selectable:true,
        select:function(info){
            // 選択した日程を反映（のこりは初期化）
            document.getElementById("new-id").value = "";
            document.getElementById("new-event_title").value = "";
            document.getElementById("new-start_date").value = formatDate(info.start); // 選択した開始日を反映
            document.getElementById("new-end_date").value = formatDate(info.end, "end"); // 選択した終了日を反映
            document.getElementById("new-event_body").value = "";
            document.getElementById("new-event_color").value = "blue";
            // 新規予定追加モーダルを開く
            document.getElementById('modal-add').style.display = 'flex';
        },
        
        // DBに登録した予定を表示する
        events: function (info, successCallback, failureCallback) { // eventsはページが切り替わるたびに実行される処理を設定する
            // axiosでLaravelの予定取得処理を呼び出す
            axios
                .post("/calendar/get", {
                    // 現在カレンダーが表示している日付の期間(1月ならば、start_date=1月1日、end_date=1月31日となる)
                    start_date: info.start.valueOf(),
                    end_date: info.end.valueOf(),
                })
                .then((response) => {
                    // 既に表示されているイベントを削除（重複防止）
                    calendar.removeAllEvents(); // ver.6でもどうやら使える（ドキュメントにはない？）
                    // カレンダーに読み込み
                    successCallback(response.data); // successCallbackに予定をオブジェクト型で入れるとカレンダーに表示できる
                })
                .catch((error) => {
                    // バリデーションエラーなど
                    alert("登録に失敗しました。");
                });
        },
        
        //予定を編集する画面を表示する
        eventClick: function(info){
            document.getElementById("id").value = info.event.id;
            document.getElementById("delete-id").value = info.event.id;
            document.getElementById("event_title").value = info.event.title;
            document.getElementById("start_date").value = formatDate(info.event.start);
            document.getElementById("end_date").value = formatDate(info.event.end, "end");
            document.getElementById("event_body").value = info.event.extendedProps.description;
            document.getElementById("event_color").value = info.event.backgroundColor;
            
            document.getElementById('modal-update').style.display = 'flex';
        },
    });
    
    calendar.render();
    
    //新規予定登録のモーダル画面で「キャンセル」が押されたときにモーダルを閉じる関数
    window.closeAddModal = function(){
        document.getElementById('modal-add').style.display= 'none';
    }
    
    window.closeUpdateModal = function(){
        document.getElementById('modal-update').style.display = 'none';
    }
    
    window.deleteEvent = function(){
        'use strict'
        
        if(confirm('削除すると復元できません。\n本当に削除しますか？')){
            document.getElementById('delete-form').submit();
        }
    }
}