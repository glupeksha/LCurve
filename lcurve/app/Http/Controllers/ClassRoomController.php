<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classRooms = ClassRoom::orderby('id','desc')->paginate(5);
        return view('classRooms.index',compact('classRooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $searchableList='App\Grade'::all();
      return view('classRooms.create',compact('searchableList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validating class Room
        $this->validate($request, [
            'searched_id'=>'required',
            'name'=>'required',
            ]);

        $classRooms = ClassRoom::create([
          'grade_id'=>$request->input('searched_id'),
          'name'=>$request->input('name')
        ]);

    //Display a successful message upon save
        return redirect()->route('classRooms.index')
            ->with('flash_message', 'classRoom,
             '. $classRooms->name.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classRoom)
    {
        return view ('classRooms.show', compact('classRoom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classRoom)
    {
        return view ('classRooms.edit', compact('classRoom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRoom $classRoom)
    {

        //validating class Room
        $this->validate($request, [
            'grade_id'=>'required',
            'name'=>'required',
        ]);

        $classRoom->grade_id = $request->input('grade_id');
        $classRoom->name = $request->input('name');
        $classRoom->save();

        return redirect()->route('classRooms.show',
            $classRoom->id)->with('flash_message',
            'Article, '. $classRoom->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $classRoom)
    {
         //$announcement = Announcement::findOrFail($id);
        $classRoom->delete();

        return redirect()->route('classRooms.index')
            ->with('flash_message',
             'Article successfully deleted');
    }
}
