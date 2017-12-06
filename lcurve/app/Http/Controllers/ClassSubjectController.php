<?php

namespace App\Http\Controllers;

use App\ClassSubject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $classSubjects = ClassSubject::orderby('id','desc')->paginate(5);
        return view('classSubjects.index',compact('classSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classSubjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating classSubject
        $this->validate($request, [
            'class_room_id'=>'required|numeric',
            'subject_id'=>'required|numeric',
            'teacher_id'=>'required|numeric',
            ]);
        
        $classSubjects = ClassSubject::create($request->only('class_room_id','subject_id','teacher_id'));

    //Display a successful message upon save
        return redirect()->route('classSubjects.index')
            ->with('flash_message', 'classSubject is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassSubject  $classSubject
     * @return \Illuminate\Http\Response
     */
    public function show(ClassSubject $classSubject)
    {
        return view ('classSubjects.show', compact('classSubject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassSubject  $classSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassSubject $classSubject)
    {
        return view ('classSubjects.edit', compact('classSubject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassSubject  $classSubject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassSubject $classSubject)
    {
        #validate for classSubject
        $this->validate($request, [
            'class_room_id'=>'required|numeric',
            'subject_id'=>'required|numeric',
            'teacher_id'=>'required|numeric',  
        ]);

        $classSubject->class_room_id = $request->input('class_room_id');
        $classSubject->subject_id = $request->input('subject_id');
        $classSubject->teacher_id = $request->input('teacher_id');
        $classSubject->save();

        return redirect()->route('classSubjects.show',
            $classSubject->id)->with('flash_message',
            'Article updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassSubject  $classSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassSubject $classSubject)
    {
         $classSubject->delete();

        return redirect()->route('classSubjects.index')
            ->with('flash_message',
             'Article successfully deleted');
    }
}
