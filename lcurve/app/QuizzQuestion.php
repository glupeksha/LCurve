<?php

namespace App;
use App\QuizzQuestionOption;

use Illuminate\Database\Eloquent\Model;

class QuizzQuestion extends Model
{
    protected $fillable = ['question_text', 'code_snippet', 'answer_explanation', 'more_info_link', 'topic_id'];

     public function options()
    {
        return $this->hasMany(QuizzQuestionsOption::class, 'question_id');
    }

    public function topic()
    {
        return $this->belongsTo(QuizzTopic::class, 'topic_id');
    }

    public function setTopicIdAttribute($input)
    {
        $this->attributes['topic_id'] = $input ? $input : null;
    }

     public function quizzes()
    {
        return $this->belongsToMany('App\Quiz');
        
    }
}
