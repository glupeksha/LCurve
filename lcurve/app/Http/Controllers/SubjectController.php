<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;


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
        $subjects = Subject::orderby('id','desc')->paginate(5);
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

        //Validating name and content field
        $this->validate($request, [
            'name'=>'required|max:100',
            'image' =>'required',
            'color'=>'required'
            ]);

        //create png image
        $img=Image::make(Input::file('image'))->encode('png')->encode('data-url');

        $subject = Subject::create([
            'name'=>$request['name'],
            'image'=>$img,
            'color'=>$request['color']
        ]);

        //Display a successful message upon save
        return redirect()->route('subjects.index')
            ->with('flash_message', 'subject,
             '. $subject->name.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('subjects.show',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view ('subjects.edit',compact('subject'));
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
            'name'=>'required|max:100',
            'image'=>'required',
            'color'=>'required',
        ]);

        //create png image
        $img=Image::make(Input::file('image'))->encode('png')->encode('data-url');

        $subject->name = $request->input('name');
        $subject->image = $img;
        $subject->color = $request->input('color');
        $subject->save();

        return redirect()->route('subjects.show',
            $subject->id)->with('flash_message',
            'Subject, '. $subject->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('flash_message',
             'Article successfully deleted');
    }
}
