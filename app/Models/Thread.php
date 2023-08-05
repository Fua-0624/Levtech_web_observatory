<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Observatory;

class Thread extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable=['observatory_id','article'];
    
    public function observatory(){
        return $this->belongsTo(Observatory::class);
    }
    
}
