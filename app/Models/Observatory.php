<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use App\Models\Thread;
use App\Models\Observatory;

class Observatory extends Model
{
    use HasFactory;
    
    public function region(){
        return $this->belongsTo(Region::class,'region_id');
    }
    
    public function threads(){
        return $this->hasMany(Thread::class);
    }
    
    public function getByJapanMap(){
        return $this::where('JapanMap','○')->get();
    }
}
