<head>
    <link href="{{ asset('/css/home.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HOME') }}
        </h2>
    </x-slot>
    <h2 class="headline">ようこそおいでくださいました！</h2>
    <h2 class="headline">HOME画面では口径が100cm以上の望遠鏡を持つ天文台が載ってます♪</h2>
    
    <div class="kakomi-tape">
	   <span class="title-tape">このページの使い方</span>
	   <p>・星にカーソルを合わせてみて！天文台の情報が見れるよ！</p>
	   <p>・星をクリックしてみて！天文台のHPに飛べるよ！</p>
	</div>
	
	<!--日本地図の表示-->
    <div class="map">
        <img src="{{ asset('/css/image/Japan.PNG') }}" usemap="#Japan" alt="日本地図" class="map"/>
        <map name="Japan">
            @foreach($observatories as $key => $observatory)
             <area shape="circle" coords="{{ $observatory->Coordinate }}" href="{{ $observatory->HP_link }}" class="observatory" onmouseover="showTooltip({{ $key }})"/>
            @endforeach
        </map>
        <!--マウスオーバーで表示-->
        <div class="tooltip" id="tooltip">
            <p id="title" class="text-lg font-semibold"></p>
            <table class="pop_up">
                <tr>
                    <td>宿泊施設</td>
                    <td><span class="font-medium" id="hotel"></span></td>
                </tr>
                <tr>
                    <td>プラネタリウム</td>
                    <td><span class="font-medium" id="planetarium"></span></td>
                </tr>
                <tr>
                    <td>住所</td>
                    <td>〒<span class="font-medium" id="address_number"></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td><span class="font-medium" id="address"></span></td>
                </tr>
            </table>
        </div>
    </div>
	    
	<h2 class="headline">全国の天文台のイベント日程</h2>
	<!--カレンダーの表示-->
    <div id='calendar'></div> 
    
    <!--カレンダーの新規追加：デフォルトでは表示されていない：「予定を追加」ボタンを押すか、カレンダーで予定を入れたい場所を選択すると表示される-->
    <div id="modal-add" class="modal">
        <div class="modal-contents">
            <form method="POST" action="{{ route('event.create') }}">
                @csrf
                <input id="new-id" type="hidden" name="id" value="" />
                <!--天文台を選択-->
                <label>天文台</label>
                <select id="input_observatory" class="input_observatory" name="observatory_id">
                    @php
                        $regionid = -1 ;
                    @endphp
                    @foreach($all_observatories as $observatory)
                        @if( $observatory->region_id != $regionid )
                            <optgroup id="optgroup" label="{{ $observatory->region->region_name }}"></optgroup>
                        @endif
                            <option value="{{ $observatory->id }}">&ensp;&ensp;{{ $observatory->observatory }}</option>
                        @php
                            $regionid = $observatory->region_id;
                        @endphp
                    @endforeach
                </select>
                <!--イベントのタイトルを記入-->
                <label for="event_title">タイトル</label>
                <input id="new-event_title" class="input-title" type="text" name="event_title" value="" />
                <!--イベントの開始日時を記入-->
                <label for="start_date">開始日時</label>
                <input id="new-start_date" class="input-date" type="date" name="start_date" value="" />
                <!--イベントの終了日時を記入-->
                <label for="end_date">終了日時</label>
                <input id="new-end_date" class="input-date" type="date" name="end_date" value="" />
                <!--イベントの内容を記入-->
                <label for="event_body" style="display: block">内容</label>
                <textarea id="new-event_body" name="event_body" rows="3" value=""></textarea>
                <!--カレンダーに表示するときの色を選択-->
                <label for="event_color">背景色</label>
                <select id="new-event_color" name="event_color">
                    <option value="blue" selected>青</option>
                    <option value="green">緑</option>
                </select>
                <button type="button" onclick="closeAddModal()">キャンセル</button>
                <button type="submit">決定</button>
            </form>
        </div>
    </div>
        
    <!--カレンダーの編集：編集したい予定をクリックすると表示される-->
    <div id="modal-update" class="modal">
        <div class="modal-contents">
            <form method="POST" action="{{ route('update') }}" >
                @csrf
                @method('PUT')
                <input type="hidden" id="id" name="id" value="" />
                <label>天文台</label>
                <select id="input_observatory" class="input_observatory" name="observatory_id">
                    @php
                        $regionid = -1 ;
                    @endphp
                    @foreach($all_observatories as $observatory)
                        @if( $observatory->region_id != $regionid )
                            <optgroup id="optgroup" label="{{ $observatory->region->region_name }}"></optgroup>
                        @endif
                            <option value="{{ $observatory->id }}">&ensp;&ensp;{{ $observatory->observatory }}</option>
                        @php
                            $regionid = $observatory->region_id;
                        @endphp
                    @endforeach
                </select>
                <label for="event_title">タイトル</label>
                <input class="input-title" type="text" id="event_title" name="event_title" value="" />
                <label for="start_date">開始日時</label>
                <input class="input-date" type="date" id="start_date" name="start_date" value="" />
                <label for="end_date">終了日時</label>
                <input class="input-date" type="date" id="end_date" name="end_date" value="" />
                <label for="event_body" style="display: block">内容</label>
                <textarea id="event_body" name="event_body" rows="3" value=""></textarea>
                <label for="event_color">背景色</label>
                <select id="event_color" name="event_color">
                    <option value="blue">青</option>
                    <option value="green">緑</option>
                </select>
                <button type="button" onclick="closeUpdateModal()">キャンセル</button>
                <button type="submit">決定</button>
            </form>
            <!--削除ボタン-->
            <form id="delete-form" method="post" action="{{ route('delete')}}">
                @csrf
                @method('DELETE')
                <input type="hidden" id="delete-id" name="id" value=""/>
                <button class="delete" type="button" onclick="deleteEvent()">削除</button>
            </form>
        </div>
    </div>
        
    <!--最新のイベント情報の表示-->
	<div class="kokuban">
        <span class="title-t2">イベント情報</span>
        @foreach($threads as $thread)
            <p>
                <a href="/observatories/{{ $thread->observatory_id}}/threads"><span class="font-semibold">{{ $thread->observatory->observatory }}</span>&nbsp;&nbsp;&nbsp;</a>
                <a href="/threads/{{ $thread->id }}">{{ $thread->event_day }}&nbsp;&nbsp;&nbsp;{{ $thread->title}}</a>
            </p>
        @endforeach
    </div>

　　<!--JavaScript-->
    <script>
            //ポップアップ機能
            $('img[usemap]').rwdImageMaps();
            function showTooltip(area) {
                const data = @json($observatories);
                const tooltip = document.getElementById('tooltip');
                const title = document.getElementById('title');
                const hotel = document.getElementById('hotel');
                const planetarium = document.getElementById('planetarium');
                const address_number = document.getElementById('address_number');
                const address = document.getElementById('address');
                if (isFinite(area)){
                    title.textContent = data[area].observatory;
                    hotel.textContent = data[area].hotel;
                    planetarium.textContent = data[area].planetarium;
                    address_number.textContent = data[area].address_number;
                    address.textContent = data[area].address;
                }
                tooltip.style.display = 'block';
                tooltip.style.left = event.pageX + 'px';
                tooltip.style.top = event.pageY + 'px';
            }

            function hideTooltip() {
                const tooltip = document.getElementById('tooltip');
                tooltip.style.display = 'none';
            }

            const observatories = document.querySelectorAll('area');
            observatories.forEach(area => {
            area.addEventListener('mouseout', hideTooltip);
            });
        </script>
        
        <style scoped>
            .fc-event-title-container{
                cursor:pointer;
            }
            /* モーダルのオーバーレイ */
            .modal{
                display: none; /* モーダル開くとflexに変更（ここの切り替えでモーダルの表示非表示をコントロール） */
                justify-content: center; /*表示場所の左右の調整*/
                align-items: center;
                position: absolute; /*ここを削除するとモーダルがカレンダーの下に表示される*/
                z-index: 10; /* カレンダーの曜日表示がz-index=2のため、それ以上にする必要あり */
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                height: 100%;
                width: 100%;
                background-color: rgba(0,0,0,0.5);
            }
            /* モーダル */
            .modal-contents{
                background-color: white;
                height: 700px;
                width: 850px;
                padding: 20px;
            }
            
            /* 以下モーダル内要素のデザイン調整 */
            input{
                padding: 2px;
                border: 1px solid black;
                border-radius: 5px;
            }
            .input-title{
                display: block;
                width: 80%;
                margin: 0 0 20px;
            }
            .input-date{
                width: 27%;
                margin: 0 5px 20px 0;
            }
            .event_color{
                display: block;
                width: 20%;
                margin: 0 0 20px;
                padding: 2px;
                border: 1px solid black;
                border-radius: 5px;
            }
            .input_observatory{
                display: block;
                width: 70%;
                margin: 0 0 20px;
                padding: 2px;
                border: 1px solid black;
                border-radius: 5px;
            }
            textarea{
                display: block;
                width: 80%;
                margin: 0 0 20px;
                padding: 2px;
                border: 1px solid black;
                border-radius: 5px;
                resize: none;
            }
        </style>
</x-app-layout>
