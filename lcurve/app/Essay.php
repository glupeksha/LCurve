<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
   protected $fillable = [
        'question','content',
    ];

         public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $model->permissions()->create(['name'=>'Edit Essay'.' '.$model->id]);
            $model->permissions()->create(['name'=>'View Essay'.' '.$model->id]);
            $model->permissions()->create(['name'=>'Delete Essay'.' '.$model->id]);
        });


        self::deleted(function($model){
            $model->permissions()->delete();
        });
    }
    public function permissions()
    {
        return $this->morphMany('App\Permission', 'permissible');
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function essayAnswers()
    {
      return $this->hasMany(EssayAnswer::class);
    }

    public function addEssay($essayAnswer)
    {  
         EssayAnswer::create([
        'user_id'=>\Auth::user()->id,
        'essay_id'=>$this->id,
        'content'=>$essayAnswer['content'],
      ]);
    	
    }
    

}


    

