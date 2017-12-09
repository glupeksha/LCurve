<?php

namespace App\Http\Controllers;

use App\QuizzTopic;
use App\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizzTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = QuizzTopic::all();

        return view('quizzTopics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = [
            'topics' => \App\Topic::get()->pluck('name','id')->prepend('Please select', ''),
        ];
        return view('quizzTopics.create',$relations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topic=Topic::findOrFail($request->name);
        $name = $topic->name;
        QuizzTopic::create([
            'name'=>$name,
        ]);

        return redirect()->route('quizzTopics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuizzTopic  $quizzTopic
     * @return \Illuminate\Http\Response
     */
    public function show(QuizzTopic $quizzTopic)
    {
        $topic = QuizzTopic::findOrFail($quizzTopic->id);

        return view('quizzTopics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuizzTopic  $quizzTopic
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizzTopic $quizzTopic)
    {
        $relations = [
            'topics' => \App\Topic::get()->pluck('name','id')->prepend('Please select', ''),
        ];
        $topic = QuizzTopic::findOrFail($quizzTopic->id);

        return view('quizzTopics.edit', compact('topic')+$relations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuizzTopic  $quizzTopic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizzTopic $quizzTopic)
    {     
        $topic=Topic::findOrFail($request->name);
        $name = $topic->name;

         $topic = QuizzTopic::findOrFail($quizzTopic->id);
        $topic->update([
            'name'=>$name,
            ]);

        return redirect()->route('quizzTopics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuizzTopic  $quizzTopic
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizzTopic $quizzTopic)
    {
        $topic = QuizzTopic::findOrFail($quizzTopic->id);
        $topic->delete();

        return redirect()->route('quizzTopics.index');
    }

    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Topic::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
