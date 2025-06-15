<?php

namespace App\Http\Controllers\Accountant;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountantProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:accountant');
        $this->middleware('accountant-banned');
        $this->middleware('checktwofa');
    }
    
    public function accountantProfile()
    {
        $user = Auth::user();
        if(Auth::check() && $user->hasRole('accountant')){
            return view('accountant.profile',compact('user'));
        }
    }
}
