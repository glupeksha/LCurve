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

    public function topics()
    {
        return $this->hasMany('App\Topic');
    }
    public function topicSeq()
    {
      return $this->topics()->orderBy('seqNo')->get();
    }
    public function maintopics()
    {
      return $this->topics()->orderBy('seqNo')->where('parent',null)->get();
    }
    public function subtopics($parent_id)
    {
      return $this->topics()->orderBy('seqNo')->where('parent',$parent_id)->get();
    }

}
