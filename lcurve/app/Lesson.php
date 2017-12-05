<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title', 'content'
    ];

    public function topic()
    {
      $this->belongsTo('App\Topic');
    }
}
