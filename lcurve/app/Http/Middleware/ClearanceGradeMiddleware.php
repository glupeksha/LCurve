<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceGradeMiddleware
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

      if($request->is('grades/create')){
        if(Auth::user()->hasPermissionTo('Create Grade')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->is('grades/*/edit')){
        if(Auth::user()->hasPermissionTo('Edit Grade')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->isMethod('Delete')){
        if(Auth::user()->hasPermissionTo('Delete Grade')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }
      return $next($request);
    
    }
}
