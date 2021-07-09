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
        $this->middleware('auth:matron');
    }
    
    public function matronProfile()
    {
        $user = Auth::user();

    	return view('matron.profile',compact('user'));
    }
}
