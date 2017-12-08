<?php

namespace App\Http\Controllers;
use App\Auth;
use App\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'clearanceForum'])->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forums = Forum::orderby('id','desc')->paginate(5);
        return view('forums.index',compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forums.create');
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

       
        $forum = Forum::create([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
            'user_id'=>\Auth::user()->id,
        ]);

    //Display a successful message upon save
        return redirect()->route('forums.index')
            ->with('flash_message', 'Article,
             '. $forum->title.' created');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        return view ('forums.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        return view ('forums.edit', compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        $this->validate($request, [
            'title'=>'required|max:100',
            'content'=>'required',
        ]);

        $forum->title = $request->input('title');
        $forum->content = $request->input('content');
        $forum->save();

        return redirect()->route('forums.show',
            $forum->id)->with('flash_message',
            'Article, '. $forum->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        $forum->delete();

        return redirect()->route('forums.index')
            ->with('flash_message',
             'forum successfully deleted');
    }
}
