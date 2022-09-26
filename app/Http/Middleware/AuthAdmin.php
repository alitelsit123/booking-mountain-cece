<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdmin
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
      $user = auth()->user();
      if(!$user) {
        abort(404);
      }
      if($user->role !== 'admin') {
        abort(404);
      }

      return $next($request);
    }
}
