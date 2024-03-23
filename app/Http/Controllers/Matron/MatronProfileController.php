<?php

namespace App\Http\Controllers\Matron;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatronProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:matron');
        $this->middleware('matron-banned');
        $this->middleware('checktwofa');
    }
    
    public function matronProfile()
    {
        $user = Auth::user();
        if($user->hasRole('matron')){
            return view('matron.profile',compact('user'));
        }
    }
}
