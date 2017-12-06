<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $fillable = [
         'class_room_id','subject_id','teacher_id'
    ];

     public function classRoom()
    {
        return $this->belongsTo('App\ClassRoom','class_room_id','id');
    }

     public function subject()
    {
        return $this->belongsTo('App\Subject','subject_id','id');
    }

     public function teacher()
    {
        return $this->belongsTo('App\User','teacher_id','id');
    }


    public function students()
    {
        return $this->belongsToMany('App\User');
        
    }

    

     
    
    
}
