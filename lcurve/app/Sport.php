<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{

   protected $fillable = [
        'name', 'content','subscribe','color'
    ];

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $model->permissions()->create(['name'=>'Add Announcement'.' '.$model->id]);
            $model->permissions()->create(['name'=>'Edit Sport'.' '.$model->id]);
            $model->permissions()->create(['name'=>'View Sport'.' '.$model->id]);
            $model->permissions()->create(['name'=>'Delete Sport'.' '.$model->id]);
        });


        self::deleted(function($model){
            $model->permissions()->delete();
        });
    }

     public function announcements()
    {
        return $this->morphMany('App\Announcement','announceable');
    }

    public function addAnnouncement(Announcement $announcement)
    {
    	$this->announcements()->save($announcement);
    }
    public function permissions()
    {
        return $this->morphMany('App\Permission', 'permissible');
    }
}
