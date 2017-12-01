<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validating title and content field
        $this->validate($request, [
            'title'=>'required|max:100',
            'image' =>'required',
            'color'=>'required'
            ]);



        $subjects = Subject::create([
            'title'=>$request['title'],
            'image'=>$request['image'],
            'color'=>$request['color']
        ]);

    //Display a successful message upon save
        return redirect()->route('subjects.index')
            ->with('flash_message', 'subject,
             '. $subjects->title.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view ('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view ('subjects.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
       $this->validate($request, [
            'title'=>'required|max:100',
            'image'=>'required',
            'color'=>'required',
        ]);

        $subjects = Subject::findOrFail($id);
        $subjects->title = $request->input('title');
        $subjects->image = $request->input('image');
        $subjects->save();

        return redirect()->route('subjects.show',
            $subjects->id)->with('flash_message',
            'Subject, '. $subjects->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
