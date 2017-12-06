<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceClassRoomMiddleware
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

      if($request->is('classRooms/create')){
        if(Auth::user()->hasPermissionTo('Create ClassRoom')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->is('classRooms/*/edit')){
        if(Auth::user()->hasPermissionTo('Edit ClassRoom')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->isMethod('Delete')){
        if(Auth::user()->hasPermissionTo('Delete ClassRoom')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }
      return $next($request);
    }
}
