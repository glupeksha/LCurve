<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = [
        'grade_id', 'name'
    ];

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $model->permissions()->create(['name'=>'Add Announcement'.' '.$model->id]);
            $model->permissions()->create(['name'=>'Edit ClassRoom'.' '.$model->id]);
            $model->permissions()->create(['name'=>'View ClassRoom'.' '.$model->id]);
            $model->permissions()->create(['name'=>'Delete ClassRoom'.' '.$model->id]);
        });


        self::deleted(function($model){
            $model->permissions()->delete();
        });
    }
    public function getNameAttribute($value)
    {
        return $this->grade()->first()->name.' '.$value;
    }
    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function classSubjects()
    {
        return $this->hasMany('App\ClassSubject');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function permissions()
    {
        return $this->morphMany('App\Permission', 'permissible');
    }
}
