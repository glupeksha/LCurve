<?php

namespace App\Http\Controllers;

use App\QuizzQuestion;
use App\QuizzQuestionOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizzQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = QuizzQuestion::all();
         return View('quizzQuestions.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $relations = [
            'topics' => \App\QuizzTopic::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];

        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4',
            'option5' => 'Option #5'
        ];

        return view('quizzQuestions.create', compact('correct_options')+$relations);
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questions = QuizzQuestion::create($request->all());

        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                QuizzQuestionOption::create([
                    'question_id' => $questions->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }
        
        return redirect()->route('quizzQuestions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuizzQuestion  $quizzQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(QuizzQuestion $quizzQuestion)
    {

        $quizzQuestion = QuizzQuestion::findOrFail($quizzQuestion->id);


        return view('quizzQuestions.show', compact('quizzQuestion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuizzQuestion  $quizzQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizzQuestion $quizzQuestion)
    {
        $relations = [
            'topics' => \App\QuizzTopic::get()->pluck('name', 'id')->prepend('Please select', ''),
        ];
         
        $quizzQuestion = QuizzQuestion::findOrFail($quizzQuestion->id);

        return view('quizzQuestions.edit', compact('quizzQuestion')+$relations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuizzQuestion  $quizzQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizzQuestion $quizzQuestion)
    {
        $quizzQuestion = QuizzQuestion::findOrFail($quizzQuestion->id);
        $quizzQuestion->update($request->all());

        return redirect()->route('quizzQuestions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuizzQuestion  $quizzQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizzQuestion $quizzQuestion)
    {
        $question = QuizzQuestion::findOrFail($quizzQuestion->id);
        $question->delete();

        return redirect()->route('quizzQuestions.index');
    }
}
