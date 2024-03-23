<?php

namespace App\Http\Controllers\Subordinate;

use Auth;
use App\Models\Subordinate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubordinateProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:subordinate');
        $this->middleware('subordinate-banned');
        $this->middleware('checktwofa');
    }
    
    public function subordinateProfile()
    {
        $user = Auth::user();

    	return view('subordinate.profile',compact('user'));
    }
}
