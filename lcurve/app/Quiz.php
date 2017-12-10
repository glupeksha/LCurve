<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
     public function tasks()
    {
        return $this->morphMany('App\Task','taskable');
    }

     public function questions()
    {
        return $this->belongsToMany('App\QuizzQuestion');
        
    }
}
