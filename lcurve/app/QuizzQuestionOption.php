<?php

namespace App;
use App\QuestionOption;

use Illuminate\Database\Eloquent\Model;

class QuizzQuestionOption extends Model
{
    protected $fillable = ['option', 'correct', 'question_id'];

    public function question()
    {
        return $this->belongsTo(QuizzQuestion::class, 'question_id');
    }

    public function setQuestionIdAttribute($input)
    {
        $this->attributes['question_id'] = $input ? $input : null;
    }
    
}
