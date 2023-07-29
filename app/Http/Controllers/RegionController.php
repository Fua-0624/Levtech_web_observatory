<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Observatory;

class RegionController extends Controller
{
  public function region(Region $region){
      //dd($region->observatories()->get());
      return view('observatories/region')->with(['observatories'=>$region->observatories()->get(), 'region' =>$region]);
  }
}
