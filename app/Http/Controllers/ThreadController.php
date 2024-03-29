<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Observatory;
use App\Models\Thread;
use App\Http\Requests\ThreadRequest;
use App\Models\Event;

class ThreadController extends Controller
{
    public function create(Observatory $observatory){
        return view('threads/create')->with(['observatories' => $observatory->get()]);
    }
    
    public function detail(Thread $thread){
        return view('threads/detail')->with(['thread'=>$thread, 'comments'=>$thread->comments()->get()]);
    }
    
    public function table(Thread $thread){
        return view('threads/list')->with(['threads'=>$thread->get()]);
    }
    
    public function store(ThreadRequest $request, Thread $thread, Event $event){
        //スレッドの内容を保存
        $input = $request['thread'];
        $input['user_id'] = Auth::id();
        $thread->fill($input)->save();
        
        if($thread->event === "Yes"){
            //カレンダーへの登録
            $event->event_title = $thread->title;
            $event->event_body = $thread->article;
            $event->start_date = $request->input('start_date');
            $event->end_date = date("Y-m-d", strtotime("{$request->input('end_date')} + 1 day"));
            $event->event_color = $request->input('event_color');
            $event->event_border_color = $request->input('event_color');
            $event->observatory_id = $thread->observatory_id;
            $event->save();
        };
        
        return redirect('/observatories/'.$thread->observatory->id.'/threads');
    }
    
    public function edit(Thread $thread){
        return view('threads/edit')->with(['thread'=>$thread]);
    }
    
    public function update(ThreadRequest $request, Thread $thread){
        $input_thread = $request['thread'];
        $thread->fill($input_thread)->save();
        return redirect('/observatories/'.$thread->observatory->id.'/threads');
    }
    
    public function delete(Thread $thread){
        $thread->delete();
        return redirect('/observatories/'.$thread->observatory->id.'/threads');
    }

}
