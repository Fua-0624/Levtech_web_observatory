<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Thread;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable=['article','thread_id','user_id'];
    
    public function thread(){
        return $this->belongsTo(Thread::class);
    }
}
