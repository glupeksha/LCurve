<?php

namespace App\Http\Controllers;

use App\Essay;
use Illuminate\Http\Request;

class EssayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $essays = Essay::orderby('id','desc')->paginate(5);
        return view('essays.index',compact('essays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('essays.create');
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
            'question'=>'required',
            'content' =>'required',
    ]);


        $essay = Essay::create($request->only('question', 'content'));

    //Display a successful message upon save
        return redirect()->route('essays.index')
            ->with('flash_message', 'Article,
             '. $essay->name.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Essay  $essay
     * @return \Illuminate\Http\Response
     */
    public function show(Essay $essay)
    {
       return view ('essays.show', compact('essay'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Essay  $essay
     * @return \Illuminate\Http\Response
     */
    public function edit(Essay $essay)
    {
       return view ('essays.edit', compact('essay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Essay  $essay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Essay $essay)
    {
        $this->validate($request, [
             'question'=>'required',
            'content'=>'required',
            
            
        ]);

        $essay->question = $request->input('question');
        $essay->content= $request->input('content');
        $essay->save();

        return redirect()->route('essays.show', 
            $essay->id)->with('flash_message', 
            'Article updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Essay  $essay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Essay $essay)
    {
       $essay->delete();

        return redirect()->route('essays.index')
            ->with('flash_message',
             'Essay successfully deleted');
    }
}
