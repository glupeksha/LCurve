<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = ['user_id','forum_id','content'];

  public function forum(){
    return $this->belongsTo(Forum::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }
}
