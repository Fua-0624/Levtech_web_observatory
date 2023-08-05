<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Observatory;
use App\Models\Comment;

class Thread extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable=['observatory_id','title','article'];
    
    public function observatory(){
        return $this->belongsTo(Observatory::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
