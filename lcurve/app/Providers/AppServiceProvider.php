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
        $shortEvents = $events->map(function ($events) {
              return collect($events->toArray())
                  ->only(['start', 'title','url','id'])
                  ->all();
          });

        View::share('events', $shortEvents);
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
