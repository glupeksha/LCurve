<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class EssayAnswer extends Model
{

  protected $fillable = ['user_id','essay_id','essay','content'];

 public function essay(){
    return $this->belongsTo(Essay::class);
  }
  public function user(){
    return $this->belongsTo(User::class);
  }
}
