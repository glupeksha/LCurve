<?php

namespace App\Http\Middleware;

use Closure;

class ClearanceRoleMiddleware
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
        if($request->isMethod('Delete')){
        if(Auth::user()->hasPermissionTo('Delete Role')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }
        return $next($request);
    }
}
