<?php

namespace App\Http\Middleware;

use Closure;

class ClearanceQuizzTopicMiddleware
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

      if($request->is('quizzTopics/create')){
        if(Auth::user()->hasPermissionTo('Create QuizzTopic')){  
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->is('quizzTopics/*/edit')){
        if(Auth::user()->hasPermissionTo('Edit QuizzTopic')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->isMethod('Delete')){
        if(Auth::user()->hasPermissionTo('Delete QuizzTopic')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }
      return $next($request);
    }
}
