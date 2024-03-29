<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Observatory;
use App\Models\Thread;

class ObservatoryController extends Controller
{
    public function home(Observatory $observatory, Region $region, Thread $thread){
        return view('observatories/home')->with(['observatories'=>$observatory->getByJapanMap(), 'all_observatories'=>$observatory->get(),'regions' => $region->get(), 'threads'=>$thread->getbyEvent()]);
    }
    
    public function index(Observatory $observatory){
        return view('threads/index')->with(['observatory'=>$observatory, 'threads'=>$observatory->threads()->get()]);
    }
    
    public function sitemap(Region $region){
        return view('observatories/sitemap')->with(['regions'=>$region->get()]);
    }
    
    //SNS編集に関する処理
    public function registerSNS(Observatory $observatory){
        return view('observatories/registerSNS')->with(['observatories'=>$observatory->get()]);
    }
    
    public function store(Request $request, Observatory $observatory){
        $observatory_id = $request['observatory_id'];
        $observatory = Observatory::where('id', $observatory_id)->first();
        $observatory->TwitterURL = $request['TwitterURL'];
        $observatory->InstagramURL = $request['InstagramURL'];
        $observatory->save();
        return redirect('/observatories/'.$observatory->id.'/threads');
    }
    
    public function editx(Observatory $observatory){
        return view('observatories/editX')->with(['observatory'=>$observatory]);
    }
    
    public function updatex(Request $request, Observatory $observatory){
        $observatory_id = $request['observatory_id'];
        $observatory = Observatory::where('id', $observatory_id)->first();
        $observatory->TwitterURL = $request['TwitterURL'];
        $observatory->save();
        return redirect('/observatories/'.$observatory->id.'/threads');
    }
    
    public function editinsta(Request $request, Observatory $observatory){
        return view('observatories/editINsta')->with(['observatory'=>$observatory]);
    }
    
    public function updateinsta(Request $request, Observatory $observatory){
        $observatory_id = $request['observatory_id'];
        $observatory = Observatory::where('id', $observatory_id)->first();
        $observatory->InstagramURL = $request['InstagramURL'];
        $observatory->save();
        return redirect('/observatories/'.$observatory->id.'/threads');
    }
}
