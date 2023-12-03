<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'superadmin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('superadmin.dashboard');
                }
                break;
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard');
                }
                break;
            case 'teacher':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('teacher.dashboard');
                }
                break;
            case 'student':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('student.dashboard');
                }
                break;
            case 'staff':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('staff.dashboard');
                }
                break;
            case 'parent':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('parent.dashboard');
                }
                break;
            case 'accountant':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('accountant.dashboard');
                }
                break;
            case 'librarian':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('librarian.dashboard');
                }
                break;
            case 'matron':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('matron.dashboard');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
                break;
        }
        return $next($request);
    }
}
