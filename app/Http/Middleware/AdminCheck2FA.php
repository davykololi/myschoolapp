<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;

class AdminCheck2FA
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
        if (!Session::has('user_2fa')) {
            return redirect()->route('admin.2fa.index');
        }
  
        return $next($request);
    }
}
