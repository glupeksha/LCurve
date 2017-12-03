<?php

namespace App\Http\Middleware;

use Closure;

class ClearanceLessonMiddleware
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

      if($request->is('lessons/create')){
        if(Auth::user()->hasPermissionTo('Create Lesson')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->is('lessons/*/edit')){
        if(Auth::user()->hasPermissionTo('Edit Lesson')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->isMethod('Delete')){
        if(Auth::user()->hasPermissionTo('Delete Lesson')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }
      return $next($request);
    }
}
