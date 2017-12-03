<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'image','color',
    ];
    
    public function announcements()
   {
       return $this->morphMany('App\Announcement','announceable');
   }
}
