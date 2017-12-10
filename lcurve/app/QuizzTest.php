<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizzTest extends Model
{
    protected $fillable = ['user_id', 'result'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
