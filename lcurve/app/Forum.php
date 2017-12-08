<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = [
        'title', 'content'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function comments(){
      return $this->hasMany(Comment::class);
    }

    public function addComment($comment){
      Comment::create([
        'user_id'=>\Auth::user()->id,
        'content'=>$comment['content'],
        'forum_id'=>$this->id,
      ]);
    }

}
