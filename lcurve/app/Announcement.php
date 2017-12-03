<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title', 'content','announceable_id','announceable_type'
    ];

    public function announceable()
    {
      return $this->morphTo();
    }
}
