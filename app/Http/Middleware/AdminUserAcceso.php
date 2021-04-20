<?php

namespace App\Http\Middleware;

use Closure;

class AdminUserAcceso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
      if (auth('admin')->check() || auth('usuario')->check()){
        return $next($request);
      }

      return redirect('/');
    }
}
