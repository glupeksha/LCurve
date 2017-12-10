<?php

namespace App\Http\Controllers;

use App\QuizzQuestionOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizzQuestionOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzQuestionOptions = QuizzQuestionOption::all();

        return view('quizzQuestionOptions.index', compact('quizzQuestionOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $relations = [
            'questions' => \App\QuizzQuestion::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        return view('quizzQuestionOptions.create', $relations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         QuizzQuestionOption::create($request->all());
        
         return redirect()->route('quizzQuestionOptions.index')
            ->with('flash_message', 'Quiz option created Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuizzQuestionOption  $quizzQuestionOption
     * @return \Illuminate\Http\Response
     */
    public function show(QuizzQuestionOption $quizzQuestionOption)
    {
    
        $relations = [
            'questions' => \App\QuizzQuestion::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $quizzQuestionOption = QuizzQuestionOption::findOrFail($quizzQuestionOption->id);


        return view('quizzQuestionOptions.show', compact('quizzQuestionOption') + $relations);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuizzQuestionOption  $quizzQuestionOption
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizzQuestionOption $quizzQuestionOption)
    {
        $relations = [
            'questions' => \App\QuizzQuestion::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $quizzQuestionOption = QuizzQuestionOption::findOrFail($quizzQuestionOption->id);

        return view('quizzQuestionOptions.edit', compact('quizzQuestionOption') + $relations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuizzQuestionOption  $quizzQuestionOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizzQuestionOption $quizzQuestionOption)
    {
        $quizzQuestionOption = QuizzQuestionOption::findOrFail($quizzQuestionOption->id);
        $quizzQuestionOption->update($request->all());

        return redirect()->route('quizzQuestionOptions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuizzQuestionOption  $quizzQuestionOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizzQuestionOption $quizzQuestionOption)
    {
        $questionsoption = QuizzQuestionOption::findOrFail($quizzQuestionOption->id);
        $questionsoption->delete();

        return redirect()->route('quizzQuestionOptions.index');
    }
}
