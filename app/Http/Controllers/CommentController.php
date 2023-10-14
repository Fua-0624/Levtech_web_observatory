<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thread;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function create(Thread $thread){
        return view('comments/create')->with(['thread'=> $thread]);
    }
    
    public function store(CommentRequest $request, Comment $comment){
        $input = $request['comment'];
        $input['user_id'] = Auth::id();
        $comment->fill($input)->save();
        return redirect('/threads/'.$comment->thread->id);
    }
}
