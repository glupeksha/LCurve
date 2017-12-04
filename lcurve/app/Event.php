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
}
