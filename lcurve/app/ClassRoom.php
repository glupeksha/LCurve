<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = [
        'grade_id', 'name'
    ];

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function classSubject()
    {
        return $this->hasMany('App\ClassSubject');
    }
}
