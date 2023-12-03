<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $errorMessage = 'Your account is suspended, please contact the admin';

        if(Auth::guard('admin')->check() && Auth::user()->is_banned == true){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login')->withErrors($errorMessage);
        }

        if(Auth::guard('teacher')->check() && Auth::user()->is_banned == true){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('teacher.login')->withErrors($errorMessage);
        }

        if(Auth::guard('student')->check() && Auth::user()->is_banned == true){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('student.login')->withErrors($errorMessage);
        }

        if(Auth::guard('accountant')->check() && Auth::user()->is_banned == true){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('accountant.login')->withErrors($errorMessage);
        }

        if(Auth::guard('librarian')->check() && Auth::user()->is_banned == true){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('librarian.login')->withErrors($errorMessage);
        }

        if(Auth::guard('matron')->check() && Auth::user()->is_banned == true){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('matron.login')->withErrors($errorMessage);
        }

        if(Auth::guard('staff')->check() && Auth::user()->is_banned == true){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('staff.login')->withErrors($errorMessage);
        }

        if(Auth::guard('parent')->check() && Auth::user()->is_banned == true){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('parent.login')->withErrors($errorMessage);
        }

        return $next($request);
    }
}
