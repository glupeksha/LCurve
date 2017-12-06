<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'name',
    ];

    public function classRooms()
    {
        return $this->hasMany('App\ClassRoom');
    }

      public function classSubjects()
    {
        
        return $this->hasManyThrough('App\ClassSubject', 'App\ClassRoom');
    }
}
