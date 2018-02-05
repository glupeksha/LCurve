<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sports = Sport::orderby('id','desc')->paginate(5);
        return view('sports.index',compact('sports'));
    }
    public function filteredIndex()
    {
        //$sports = Auth::user()->sports()->get();
        $sports = Sport::orderby('id','desc')->paginate(5);
        return view('sports.filtered_index',compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $colors=[
       '#8AD7B6'=>'#8AD7B6',
       '#337BB7'=>'#337BB7',
       '#2090B4'=>'#2090B4',
       '#37C199'=>'#37C199',
       '#1F8CA4'=>'#1F8CA4',
       '#1ABB9C'=>'#1ABB9C',
       '#23775B'=>'#23775B',
       ] ;
       return view('sports.create',compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required|max:100',
            'content'=>'required',
            'subscribe'=>'required',
            'color' =>'required',
        ]);

        $name =$request['name'];
        $content =$request['content'];
        $subscribe = $request['subscribe'];
        $color =$request['color'];

        $sport = Sport::create($request->only('name','content','subscribe','color'));

        //Display a successful message upon save
        return redirect()->route('sports.index')
            ->with('flash_message', 'Article,
             '. $sport->name.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        return view('sports.show', compact('sport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function edit(Sport $sport)
    {
        return view('sports.edit', compact('sport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        $this->validate($request, [
             'name'=>'required',
            'content'=>'required',
            'subscribe'=>'required',

        ]);

        $sport->name = $request->input('name');
        $sport->content = $request->input('content');
        $sport->subscribe = $request->input('subscribe');
        $sport->color = $request->input('color');
        $sport->save();

        return redirect()->route('sports.show',
            $sport->id)->with('flash_message',
            'Article, '. $sport->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();

        return redirect()->route('sports.index')
            ->with('flash_message',
             'Article successfully deleted');
    }
}
