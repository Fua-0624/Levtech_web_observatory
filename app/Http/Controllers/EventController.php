<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Thread;

class EventController extends Controller
{
    public function show(){
        return view("calendars.calendar");
    }
    
    //予定の新規作成(/calender/createにpostリクエストが来たときに実行される)
    public function create(Request $request, Event $event, Thread $thread){
        //バリデーションの設定
        $request->validate([
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'event_color' => 'required',
        ]);
        
        //イベント登録処理
        $event->event_title = $request->input('event_title');
        $event->event_body = $request->input('event_body');
        $event->start_date = $request->input('start_date');
        $event->end_date = date("Y-m-d", strtotime("{$request->input('end_date')} + 1 day"));
        $event->event_color = $request->input('event_color');
        $event->event_border_color = $request->input('event_color');
        $event->observatory_id = $request->input('observatory_id');
        $event->save();
        
        //スレッド登録処理
        $thread->observatory_id = $request->input('observatory_id');
        $thread->title = $request->input('event_title');
        $thread->article = $request->input('event_body');
        $thread->event = "Yes";
        $thread->user_id = Auth::id();
        $thread->save();
        
        return redirect(route("home"));
    }
    
    //予定の表示(/calender/getにp)
    public function get(Request $request, Event $event){
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
        ]);
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);
        
        return $event->query()
            ->select(
                'id',
                'event_title as title',
                'event_body as description',
                'start_date as start',
                'end_date as end',
                'event_color as backgroundColor',
                'event_border_color as borderColor',
                'observatory_id as input_observaoty'
            )
            ->where('end_date', '>' , $start_date)
            ->where('start_date' , '<' , $end_date)
            ->get();
    }
    
    //予定の編集
    public function update(Request $request, Event $event){
        $input = new Event();
        
        $input->event_title = $request->input('event_title');
        $input->event_body = $request->input('event_body');
        $input->start_date = $request->input('start_date');
        $input->end_date = date("Y-m-d", strtotime("{$request->input('end_date')} + 1 day"));
        $input->event_color = $request->input('event_color');
        $input->event_border_color = $request->input('event_color');
        $input->observaory_id = $request->input('observatory_id');
        
        $event->find($request->input('id'))->fill($input->attributesToArray())->save();
        return redirect(route("home"));
    }
    
    //予定の削除
    public function delete(Request $request, Event $event){
        $event->find($request->input('id'))->delete();
        return redirect(route("home"));
    }
}
