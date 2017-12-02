<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title', 'content'
    ];

    public function announceable()
    {
      retuen $this->morphTo();
    }
}
