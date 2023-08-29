<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Thread $thread){
        return view('comments/create')->with(['thread'=> $thread]);
    }
    
    public function store(Request $request, Comment $comment){
        $input = $request['comment'];
        $comment->fill($input)->save();
        return redirect('/threads/'.$comment->thread->id);
    }
}
