<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Model\Observatory;

class RegionController extends Controller
{
  public function region(Region $region){
      return view('observatories/region')->with(['observatories'=>$region->getByRegion()]);
  }
}
