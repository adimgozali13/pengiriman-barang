<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OperatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('level')!="Operator Pelabuhan") {
           
               return redirect('/dashboard');
           
           
       }
       
       
       
    return $next($request);
    }
}

