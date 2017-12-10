<?php

namespace App\Http\Controllers;

use App\QuizzTest;
use App\Auth;
use App\QuizzQuestion;
use App\QuizzQuestionOption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizzTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = QuizzQuestion::inRandomOrder()->limit(10)->get();
        foreach ($questions as &$question) {
            $question->options = QuizzQuestionOption::where('question_id', $question->id)->inRandomOrder()->get();
        }

        return view('quizTests.create', compact('questions'));
    }

   
    public function store(Request $request)
    {
        $result = 0;

        $test = QuizzTest::create([
            'user_id' => Auth::id(),
            'result'  => $result,
        ]);

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.'.$question) != null
                && QuizzQuestionOption::find($request->input('answers.'.$question))->correct
            ) {
                $status = 1;
                $result++;
            }
            QuizzTestAnswer::create([
                'user_id'     => Auth::id(),
                'test_id'     => $test->id,
                'question_id' => $question,
                'option_id'   => $request->input('answers.'.$question),
                'correct'     => $status,
            ]);
        }

        $test->update(['result' => $result]);

        return redirect()->route('quizesults.show', [$test->id]);
    }

    

   
}
