<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
     public function task()
    {
        return $this->morphOne('App\Task','taskable');
    }

     public function questions()
    {
        return $this->belongsToMany('App\QuizzQuestion');

    }
}
