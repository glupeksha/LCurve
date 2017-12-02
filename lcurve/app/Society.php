<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Society extends Model
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
    	$announcement->save();
    }
}
