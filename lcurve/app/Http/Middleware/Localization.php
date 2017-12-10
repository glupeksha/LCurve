<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Auth;


class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()){
          App::setLocale(Auth::user()->language);
        }
        if ( Session::has('locale')) {
            App::setLocale(Session::get('locale'));

            // You also can set the Carbon locale
            Carbon::setLocale(Session::get('locale'));
        }
        
        
        return $next($request);
    }
}
