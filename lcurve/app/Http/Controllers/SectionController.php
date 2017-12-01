<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware(['auth', 'clearanceSection'])->except('index', 'show');
    }
    public function index()
    {
        $sections = Section::orderby('id','desc')->paginate(5);
        return view('sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sections.create');
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
            'grade'=>'required|max:100',
            ]);

        $grade = $request['grade'];
        
        $sections = Section::create($request->only('grade'));

    //Display a successful message upon save
        return redirect()->route('sections.index')
            ->with('flash_message', 'Section,
             '. $sections->grade.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return view ('sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view ('sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $this->validate($request, [
            'grade'=>'required|max:100',
            
        ]);

        $section->grade = $request->input('grade');
        $section->save();

        return redirect()->route('sections.show', 
            $section->id)->with('flash_message', 
            'Article, '. $section->grade.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
         $section->delete();

        return redirect()->route('sections.index')
            ->with('flash_message',
             'Article successfully deleted');
    }
}
