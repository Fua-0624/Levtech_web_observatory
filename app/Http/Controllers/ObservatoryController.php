<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Observatory;
use App\Models\Thread;

class ObservatoryController extends Controller
{
    public function home(Observatory $observatory, Region $region ){
        return view('observatories/home')->with(['observatories'=>$observatory->getByJapanMap(), 'regions' => $region->get()]);
    }
    
    public function index(Observatory $observatory){
        return view('threads/index')->with(['observatory'=>$observatory, 'threads'=>$observatory->threads()->get()]);
    }
    
    public function registerSNS(Observatory $observatory){
        return view('observatories/registerSNS')->with(['observatories'=>$observatory->get()]);
    }
    
    public function store(Request $request, Observatory $observatory){
        $observatory_id = $request['observatory_id'];
        $observatory = Observatory::where('id', $observatory_id)->first();
        $observatory->TwitterURL = $request['TwitterURL'];
        $observatory->InstagramURL = $request['InstagramURL'];
        $observatory->save();
        return redirect('/');
    }

}
