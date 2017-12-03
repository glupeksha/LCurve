<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
 
   protected $fillable = [
        'name', 'content','subscribe','color'
    ];

     public function announcements()
    {
        return $this->morphMany('App\Announcement','announceable');
    }

    public function addAnnouncement(Announcement $announcement)
    {
    	$this->announcements()->save($announcement);
    }   //
}
