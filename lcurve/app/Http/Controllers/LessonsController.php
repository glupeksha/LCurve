<?php

namespace App\Http\Controllers;

use App\Lessons;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lessons::orderby('id','desc')->paginate(5);
        return view('lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessons.create');
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
            'content' =>'required',
            ]);

        $title = $request['title'];
        $content = $request['content'];

        $lessons = Lessons::create($request->only('title', 'content'));

    //Display a successful message upon save
        return redirect()->route('lessons.index')
            ->with('flash_message', 'Article,
             '. $lessons->title.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lessons  $lessons
     * @return \Illuminate\Http\Response
     */
    public function show(Lessons $lesson)
    {
         return view ('lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lessons  $lessons
     * @return \Illuminate\Http\Response
     */
    public function edit(Lessons $lesson)
    {
        return view ('lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lessons  $lessons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lessons $lesson)
    {
        $this->validate($request, [
            'title'=>'required|max:100',
            'content'=>'required',
        ]);

        $lesson->title = $request->input('title');
        $lesson->content = $request->input('content');
        $lesson->save();

        return redirect()->route('lessons.show',
            $lesson->id)->with('flash_message',
            'Article, '. $lesson->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lessons  $lessons
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lessons $lesson)
    {
            $lesson->delete();

        return redirect()->route('lessons.index')
            ->with('flash_message',
             'Article successfully deleted'); 
    }
}
