<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use App\Society;
use App\Sport;

class AnnouncementController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearanceAnnouncement'])->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::orderby('id','desc')->paginate(5);
        return view('announcements.index',compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcements.create');
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
            'color' =>'required',
            ]);

        $title = $request['title'];
        $content = $request['content'];

        $announcement = Announcement::create($request->only('title', 'content','color'));

    //Display a successful message upon save
        return redirect()->route('announcements.index')
            ->with('flash_message', 'Article,
             '. $announcement->title.' created');
    }

    public function storeUnderSociety(Society $society)
    {
        //Validating title and content field
        $this->validate(request(), [
            'title'=>'required|max:100',
            'content' =>'required',
            ]);

        $announcement = $society->announcements()->create(request()->only('title', 'content'));

    //Display a successful message upon save
         return redirect()->route('societies.show',$society->id)
            ->with('flash_message', 'Article,
             '. $announcement->title.' created');
    }


    public function storeUnderSport(Sport $sport)
    {
        //Validating title and content field
        $this->validate(request(), [
            'title'=>'required|max:100',
            'content' =>'required',
            ]);

        $announcement = $sport->announcements()->create(request()->only('title', 'content'));

    //Display a successful message upon save
        return redirect()->route('sports.show',$sport->id)
            ->with('flash_message', 'Article,
             '. $announcement->title.' created');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //$announcement = Announcement::findOrFail($id); //Find announcement of id = $id

        return view ('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view ('announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $this->validate($request, [
            'title'=>'required|max:100',
            'content'=>'required',
        ]);

        $announcement->title = $request->input('title');
        $announcement->content = $request->input('content');
        $announcement->save();

        return redirect()->route('announcements.show',
            $announcement->id)->with('flash_message',
            'Article, '. $announcement->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //$announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('announcements.index')
            ->with('flash_message',
             'Article successfully deleted');
    }
}
