<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        $check = Auth::check();
        $user = Auth::user();
        $url = '/authentication-code';
        switch($user){
            case $check && $user->hasRole('superadmin'):
                $this->redirectTo = $url;
                return $this->redirectTo;
                break;
            case $check && $user->hasRole('admin'):
                $this->redirectTo = $url;
                return $this->redirectTo;
                break;
            case $check && $user->hasRole('teacher'):
                $this->redirectTo = $url;
                return $this->redirectTo;
                break;
            case $check && $user->hasRole('accountant'):
                $this->redirectTo = $url;
                return $this->redirectTo;
                break;
            case $check && $user->hasRole('parent'):
                $this->redirectTo = $url;
                return $this->redirectTo;
                break;
            case $check && $user->hasRole('student'):
                $this->redirectTo = $url;
                return $this->redirectTo;
                break;
            case $check && $user->hasRole('subordinate'):
                $this->redirectTo = $url;
                return $this->redirectTo;
                break;
            case $check && $user->hasRole('matron'):
                $this->redirectTo = $url;
                return $this->redirectTo;
                break;
            case $check && $user->hasRole('librarian'):
                $this->redirectTo = $url;
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
         
        // return $next($request);
    } 
}
