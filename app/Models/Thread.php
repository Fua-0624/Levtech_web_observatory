<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Observatory;
use App\Models\Comment;
use DateTime;

class Thread extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $fillable=['observatory_id','user_id','title','article','event','event_day'];
    
    public function observatory(){
        return $this->belongsTo(Observatory::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function getbyEvent(){
        $now = new DateTime();
        $now->format('Y-m-d');
        $event_days = $this::where('event','Yes')->orderBy('event_day','desc')->get();
        return $event_days;
    }
}
