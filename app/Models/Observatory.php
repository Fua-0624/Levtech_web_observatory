<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;

class Observatory extends Model
{
    use HasFactory;
    
    public function region(){
        return $this -> hasMany(Region::class);
    }
    
}
