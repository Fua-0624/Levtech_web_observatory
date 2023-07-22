<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    
    public function observatories(){
        return $this -> belongsTo(Observatory::class);
    }
    
    public function getByRegion(){
        return $this->observatories()->with('region');
    }
}
