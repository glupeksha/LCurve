<?php

namespace App\Http\Controllers;

use App\Topic;
use App\ClassSubject;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassSubject $classSubject)
    {
      $this->validate(request(), [
          'name'=>'required|max:100',
          ]);

          $topic = $classSubject->topics()->create(request()->only('name'));

      //Display a successful message upon save
          return redirect()->back()
              ->with('flash_message', 'Article,
               '. $topic->name.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
      $this->validate($request, [
          'name'=>'required|max:100',
          'content'=>'required',
      ]);

      $topic->name = $request->input('name');
      $topic->content = $request->input('content');
      $topic->save();

      return redirect()->back()->with('flash_message',
           $topic->title.' updated');
    }
    public function updateSequence(Request $request)
    {

      $i=1;
      foreach ($request['topic'] as $topic_id=>$topic_parent) {
        $topic=Topic::find($topic_id);
        echo $topic->id;
        $topic->seqNo=$i;
        if($topic_parent!="null"){
          $topic->parent=$topic_parent;
        }else{
          $topic->parent=null;
        }
        $topic->save();
        $i++;
      }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
      $topic->delete();

      return redirect()->back()
          ->with('flash_message',
           'Article successfully deleted');
    }
}
