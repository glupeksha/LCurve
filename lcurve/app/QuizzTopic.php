<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizzTopic extends Model
{
     protected $fillable = ['name'];

     public function questions()
    {
        return $this->hasMany(QuizzQuestion::class, 'topic_id');
    }
}
