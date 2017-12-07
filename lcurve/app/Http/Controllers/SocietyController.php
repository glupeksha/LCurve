<?php

namespace App\Http\Controllers;

use App\Society;
use App\DropDown;
use Illuminate\Http\Request;
use Illuminate\lists;

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
        $dropdowns = DropDown::pluck('color');
       return view('societies.create',compact('dropdowns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               //Validating name and other fields
        $this->validate($request, [
            'name'=>'required|max:100',
            'content' =>'required',
            'subscribe' =>'required',
            'color' =>'required',
            ]);

        $name = $request['name'];
        $content = $request['content'];
        $subscribe = $request['subscribe'];
        $color = $request['color'];

        $society = Society::create($request->only('name', 'content','subscribe','color'));

    //Display a successful message upon save
        return redirect()->route('societies.index')
            ->with('flash_message', 'Article,
             '. $society->name.' created');
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
             'name'=>'required',
            'content'=>'required',
            'subscribe'=>'required',
            
        ]);

        $society->name = $request->input('name');
        $society->content = $request->input('content');
        $society->subscribe = $request->input('subscribe');
        $society->color = $request->input('color');
        $society->save();

        return redirect()->route('societies.show', 
            $society->id)->with('flash_message', 
            'Article, '. $society->name.' updated');
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
             'Society successfully deleted');
    }
}
