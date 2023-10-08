<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Observaory;

class EventSchedule extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'day',
    ];
    
    public function observatory(){
        return $this->belongsTo(Observatory::class);
    }
}
