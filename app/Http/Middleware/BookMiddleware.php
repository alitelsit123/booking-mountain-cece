<?php

namespace App\Http\Middleware;

use Closure;

class BookMiddleware
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
      if(!session()->has('leader')) {
        session()->put('leader',null);
      }
      if(!session()->has('members')) {
        session()->put('members',[]);
      }
      return $next($request);
    }
}
