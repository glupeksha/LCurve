<?php

namespace App\Http\Controllers;
use App\Essay;
use App\EssayAnswer;
use Illuminate\Http\Request;

class EssayAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Essay $essay)
    {

      $this->validate(request(),['content'=>'required|min:2']);
      $essay->addEssay( $request->input());

      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EssayAnswer  $essayAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(EssayAnswer $essayAnswer)
    {   
        return view ('essayAnswers.show',compact('essayAnswer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EssayAnswer  $essayAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(EssayAnswer $essayAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EssayAnswer  $essayAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EssayAnswer $essayAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EssayAnswer  $essayAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(EssayAnswer $essayAnswer)
    {
        //
    }
}
