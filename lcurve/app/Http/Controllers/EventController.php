<?php

namespace App\Http\Controllers;

use App\Event;
use Calendar;
use Illuminate\Http\Request;

class EventController extends Controller
{

  public function showCalendar(){
          $events = [];
          $data = Event::all();
          if($data->count()) {
              foreach ($data as $key => $value) {
                  $events[] = Calendar::event(
                      $value->title,
                      true,
                      new \DateTime($value->start),
                      new \DateTime($value->end.' +1 day'),
                      null,
                      // Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => 'pass here url and any route',
                    ]
                  );
              }
          }
          $calendar = Calendar::addEvents($events)
          ->setOptions([ //set fullcalendar options
              'firstDay' => 1,
              'height' => 'auto',
              'themeSystem' => 'bootstrap3',
              'columnHeader' => false,
              'aspectRatio' => 1
          ]);
          return view('events.calendar', compact('calendar'));
      //return view('events.index');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $events = Event::orderby('id','desc')->paginate(5);
        return view('events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('events.create');
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
        $this->validate(request(), [
            'title'=>'required|max:100',
            'start'=>'required|date|before:end',
            'end'=>'required|date|after:start',
            'color' =>'required',
            'url'=>'required',
            ]);

        $title = $request['name'];
        $start = $request['start'];
        $end = $request['end'];
        if(array_key_exists('isAllDay',$request)){
          $isAllDay = true;
        }else{
          $isAllDay = false;
        }
        $color = $request['color'];
        $url = $request['url'];

        $event = Event::create($request->only('title', 'start','end','isAllDay','color','url'));

    //Display a successful message upon save
        return redirect()->route('events.index')
            ->with('flash_message', 'Event,
             '. $event->name.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
       return view ('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
      return view ('events.edit',compact('event') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
     $this->validate($request, [
             'title'=>'required',
            'start'=>'required',
            'end'=>'required',
            'color'=> 'required',
            'url' => 'required',

        ]);

        $event->title = $request->input('title');
        $event->start = $request->input('start');
        $event->end = $request->input('end');

        if(array_key_exists('isAllDay',$request)){
          $event->isAllDay=true;
        }else{
          $event->isAllDay=false;
        }

        $event->color = $request->input('color');
        $event->url = $request->input('url');
        $event->save();

        return redirect()->route('events.show',
            $event->id)->with('flash_message',
            'Article, '. $event->name.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
         $event->delete();

        return redirect()->route('events.index')
            ->with('flash_message',
             'event successfully deleted');
    }
}
