<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
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
       if (!session('login')) {
           return redirect('/login')->with('error','Anda harus login terlebih dahulu');
           
       }
      
       
       
    return $next($request);
    }
}
