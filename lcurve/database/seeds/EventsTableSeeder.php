<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = [
        ['title'=>'Demo Event-1', 'start'=>'2017-12-11', 'end'=>'2017-12-12'],
        ['title'=>'Demo Event-2', 'start'=>'2017-12-11', 'end'=>'2017-12-13'],
        ['title'=>'Demo Event-3', 'start'=>'2017-12-14', 'end'=>'2017-12-14'],
        ['title'=>'Demo Event-3', 'start'=>'2017-12-17', 'end'=>'2017-12-17'],
      ];
      foreach ($data as $key => $value) {
        Event::create($value);
      }
    }
}
