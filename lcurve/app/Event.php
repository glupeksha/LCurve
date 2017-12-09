<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model implements \MaddHatter\LaravelFullcalendar\Event
{
    protected $fillable = ['title','start','end'];

    protected $dates = ['start', 'end'];

    public function announcement()
    {
        return $this->belongsTo('App\Announcement');
    }

     /**
      * Get the event's id number
      *
      * @return int
      */
     public function getId() {
     		return $this->id;
     }

     /**
      * Get the event's title
      *
      * @return string
      */
     public function getTitle()
     {
         return $this->title;
     }

     /**
      * Is it an all day event?
      *
      * @return bool
      */
     public function isAllDay()
     {
         return (bool)$this->all_day;
     }

     /**
      * Get the start time
      *
      * @return DateTime
      */
     public function getStart()
     {
         return $this->start;
     }

     /**
      * Get the end time
      *
      * @return DateTime
      */
     public function getEnd()
     {
         return $this->end;
     }

    /**
   * Optional FullCalendar.io settings for this event
   *
   * @return array
   */
  public function getEventOptions()
  {
      return [
          'color' => $this->color,
    //etc
      ];
  }
  public function getCalendar()
  {
    $events=Event::all();
    $calendar = Calendar::addEvents($events)
          ->setOptions([ //set fullcalendar options
              'firstDay' => 1,
              'height' => 'auto',
              'themeSystem' => 'bootstrap3',
              'columnHeader' => false,
              'aspectRatio' => 1,
              'allDayDefault'=> false, 

          ])->setCallbacks([
              'eventRender'=> 'function (event, element, view) {
                var dateString = event.start.format("YYYY-MM-DD");
        
                $(view.el[0]).find(".fc-day[data-date=" + dateString +"]").css("background-color", "#efd0e0");
                $(view.el[0]).wrap(\'<a href="sda"/>\');
              }'
          ]);
  }
}
