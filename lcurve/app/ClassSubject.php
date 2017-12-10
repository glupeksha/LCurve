<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $fillable = [
         'class_room_id','subject_id','teacher_id'
    ];
    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $model->permissions()->create(['name'=>'Add Announcement'.' '.$model->id]);
            $model->permissions()->create(['name'=>'Edit ClassSubject'.' '.$model->id]);
            $model->permissions()->create(['name'=>'View ClassSubject'.' '.$model->id]);
            $model->permissions()->create(['name'=>'Delete ClassSubject'.' '.$model->id]);
        });


        self::deleted(function($model){
            $model->permissions()->delete();
        });
    }
     public function classRoom()
    {
        return $this->belongsTo('App\ClassRoom','class_room_id','id');
    }

     public function subject()
    {
        return $this->belongsTo('App\Subject');
    }


    public function users()
    {
        return $this->belongsToMany('App\User');

    }

    public function teacher()
   {
       return $this->belongsTo('App\User','teacher_id','id');
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
    public function downloads(){
      return $this->hasMany(Download::class);
    }
    
    public function permissions()
    {
        return $this->morphMany('App\Permission', 'permissible');
    }

}
