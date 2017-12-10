<?php

use Illuminate\Database\Seeder;
use App\QuizzQuestionOPtion;

class quizzQuestionOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	QuizzQuestionOPtion::create([
    		'question_id'=>'4',
    		'option'=>'huhdu',
    		'correct'=>'Meristems',
    	]);

    	QuizzQuestionOPtion::create([
    		'question_id'=>'5',
    		'option'=>'sasa',
    		'correct'=>'Anaphase',
    	]);

    	QuizzQuestionOPtion::create([
    		'question_id'=>'6',
    		'option'=>'wsw',
    		'correct'=>'All of the above',
    	]);

    	QuizzQuestionOPtion::create([
    		'question_id'=>'7',
    		'option'=>'sdsd',
    		'correct'=>'False',
    	]);

    }
}
