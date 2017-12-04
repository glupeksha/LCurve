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
                new \DateTime($value->start_date),
                new \DateTime($value->end_date.' +1 day'),
                null,
                // Add color and link on event
              [
                  'color' => '#f05050',
                  'url' => 'pass here url and any route',
              ]
            );
        }
    }
    $calendar = Calendar::addEvents($events);
    dd($calendar);
    return view('events.calendar', compact('calendar'));
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $events = [];
      $data = Event::all();
      if($data->count()) {
          foreach ($data as $key => $value) {
              $events[] = Calendar::event(
                  $value->title,
                  true,
                  new \DateTime($value->start_date),
                  new \DateTime($value->end_date.' +1 day'),
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
