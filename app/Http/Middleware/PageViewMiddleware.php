<?php

namespace App\Http\Middleware;

use Closure;

use App\WebView;

class PageViewMiddleware
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
      if($request->segment(1) != 'a') {
        WebView::create(['view_code' => uniqid()]);
      }
      return $next($request);
    }
}
