<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Observatory;

class CommentController extends Controller
{
    public function create(Observatory $observatory){
        return view('observatories/comment')->with(['observatories' => $observatory->get()]);
    }
}
