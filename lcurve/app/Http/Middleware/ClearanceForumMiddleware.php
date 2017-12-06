<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class ClearanceForumMiddleware
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

      if($request->is('forums/create')){
        if(Auth::user()->hasPermissionTo('Create Forum')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->is('forums/*/edit')){
        if(Auth::user()->hasPermissionTo('Edit Forum')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->isMethod('Delete')){
        if(Auth::user()->hasPermissionTo('Delete Forum')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }
      return $next($request);
    }
}
