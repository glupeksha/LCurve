<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\View;
use App\Event;
use Calendar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    

    //calendar starts
    public function boot()
    {
        Schema::defaultStringLength(191);
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
                $(view.el[0]).wrap(\'<a href="'.url('events/calendar').'"/>\');
              }'
          ]);
        View::share('calendar', $calendar);
    }
    // calendar ends

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
