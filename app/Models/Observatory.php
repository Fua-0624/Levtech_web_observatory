<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;

class Observatory extends Model
{
    use HasFactory;
    
    public function region(){
        return $this->belongsTo(Region::class,'region_id');
    }
    
    public function getByJapanMap(){
        return $this::where('JapanMap','○')->get();
    }
    
}
