<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Observatory;
use App\Models\Region;
use App\Models\Thread;

class Region extends Model
{
    use HasFactory;
    
    public function observatories(){
        return $this->hasMany(Observatory::class);
    }
    
}
