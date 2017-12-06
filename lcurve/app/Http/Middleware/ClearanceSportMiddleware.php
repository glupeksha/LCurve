<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class ClearanceSportMiddleware
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

        if(Auth::user()->hasPermissionTo('Administrator Permissions')){
        return $next($request);
      }


      if($request->is('sports/*/edit')){
        if(Auth::user()->hasPermissionTo('Edit sport')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }
     
     

      if($request->is('sports/create')){
        if(Auth::user()->hasPermissionTo('Create Announcement')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->is('sports/*/edit')){
        if(Auth::user()->hasPermissionTo('Edit Announcement')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->isMethod('Delete')){
        if(Auth::user()->hasPermissionTo('Delete Announcement')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

        return $next($request);
    }
}
