<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class ClearanceClassSubjectMiddleware
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
         if($request->is('classSubjects/create')){
        if(Auth::user()->hasPermissionTo('Create ClassSubject')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->is('classSubjects/*/edit')){
        if(Auth::user()->hasPermissionTo('Edit ClassSubject')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }

      if($request->isMethod('Delete')){
        if(Auth::user()->hasPermissionTo('Delete ClassSubject')){
          return $next($request);
        }
        abort('401',"You dont have permission");
      }
      return $next($request);
    }
    }
}
