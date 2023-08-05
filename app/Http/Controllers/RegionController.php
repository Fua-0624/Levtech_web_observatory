<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Observatory;
use App\Models\Thread;

class RegionController extends Controller
{
  public function region(Region $region){
      return view('observatories/region')->with(['observatories'=>$region->observatories()->get(), 'region' =>$region]);
  }
}
