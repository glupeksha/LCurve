<?php

namespace App\Http\Middleware;

use Closure;

class ClearenceCommentMiddleware
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
        return $next($request);
    }
    if($request->is('comments/*/edit')){
        if(Auth::user()->hasPermissionTo('Edit Comment')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }
      if($request->isMethod('Delete')){
        if(Auth::user()->hasPermissionTo('Delete Comment')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }
}
