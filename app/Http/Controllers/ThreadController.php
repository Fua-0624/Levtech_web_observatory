<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observatory;
use App\Models\Thread;

class ThreadController extends Controller
{
    public function create(Observatory $observatory){
        return view('threads/create')->with(['observatories' => $observatory->get()]);
    }
    
    public function detail(Thread $thread){
        return view('threads/detail')->with(['thread'=>$thread, 'comments'=>$thread->comments()->get()]);
    }
    
    public function store(Request $request, Thread $thread){
        $input = $request['thread'];
        $thread->fill($input)->save();
        return redirect('/observatories/'.$thread->observatory->id.'/threads');
    }
    
    public function edit(Thread $thread){
        return view('threads/edit')->with(['thread'=>$thread]);
    }
    
    public function update(Request $request, Thread $thread){
        $input_thread = $request['thread'];
        $thread->fill($input_thread)->save();
        return redirect('/observatories/'.$thread->observatory->id.'/threads');
    }
    
    public function delete(Thread $thread){
        $thread->delete();
        return redirect('/observatories/'.$thread->observatory->id.'/threads');
    }

}
