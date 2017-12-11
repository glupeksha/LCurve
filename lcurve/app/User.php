<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','language'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    public function classRoom()
    {
        return $this->belongsTo('App\ClassRoom');
    }
    public function societies()
    {
        return $this->belongsToMany('App\Society');
    }
    public function sports()
    {
        return $this->belongsToMany('App\Sport');
    }
    public function classSubject()
    {
        return $this->hasMany('App\ClassSubject','teacher_id');
    }

    public function classSubjects()
    {
        return $this->belongsToMany('App\ClassSubject');

    }
     public function essayAnswers()
    {
        return $this->hasMany('App\EssayAnswer');
    }

}
