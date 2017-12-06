<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
        $this->middleware(['auth', 'clearanceGrade'])->except('index', 'show');
    }
    public function index()
    {
         $grades = Grade::orderby('id','desc')->paginate(5);
        return view('grades.index',compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:100',
            ]);

        $name = $request['name'];

        $grade = Grade::create($request->only('name'));

    //Display a successful message upon save
        return redirect()->route('grades.index')
            ->with('flash_message', 'Article,
             '. $grade->title.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        return view ('grades.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view ('grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
         $this->validate($request, [
            'name'=>'required|max:100',
            
        ]);

        $grade->name = $request->input('name');
        $grade->save();

        return redirect()->route('grades.show',
            $grade->id)->with('flash_message',
            'Article, '. $grade->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')
            ->with('flash_message',
             'Article successfully deleted');
    }
}
