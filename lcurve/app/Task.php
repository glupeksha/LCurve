<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected $fillable = [
        'title', 'due_date','content','isAssignment','taskType'
    ];

    

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
     public function dueDate()
     {
         return $this->due_date;
     }

     /**
      * Get the start time
      *
      * @return DateTime
      */
     public function getContent()
     {
         return $this->content;
     }

     /**
      * Get the end time
      *
      * @return DateTime
      */

    
     
}