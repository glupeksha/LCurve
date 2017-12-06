<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class ClearanceAnnouncementMiddleware
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
      

      if($request->is('announcements/create')){
        if(Auth::user()->hasPermissionTo('Create Announcement')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->is('announcements/*/edit')){
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
