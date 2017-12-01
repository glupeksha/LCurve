<?php

namespace App\Http\Controllers;

use App\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $societies = Society::orderby('id','desc')->paginate(5);
        return view('societies.index',compact('societies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('societies.create');
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

        $society = Society::create($request->only('title', 'content'));

    //Display a successful message upon save
        return redirect()->route('societies.index')
            ->with('flash_message', 'Article,
             '. $society->title.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
      
        return view ('societies.show', compact('society'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function edit(Society $society)
    {
        return view ('societies.edit', compact('society'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Society $society)
    {
     $this->validate($request, [
            'title'=>'required|max:100',
            'content'=>'required',
        ]);

        $society =Society::findOrFail($id);
        $society->title = $request->input('title');
        $society->content = $request->input('content');
        $society->save();

        return redirect()->route('societies.show', 
            $society->id)->with('flash_message', 
            'Article, '. $society->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function destroy(Society $society)
    {
         $society->delete();

        return redirect()->route('societies.index')
            ->with('flash_message',
             'Article successfully deleted');
    }
}
