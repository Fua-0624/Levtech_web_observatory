<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Observatory;

class ObservatoryController extends Controller
{
    public function home(Observatory $observatory){
        return view('observatories/home')->with(['observatories'=> $observatory->where('JapanMap','○')->get()]);
    }

}
