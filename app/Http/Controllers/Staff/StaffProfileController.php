<?php

namespace App\Http\Controllers\Staff;

use Auth;
use App\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
        $this->middleware('banned');
        $this->middleware('staff2fa');
    }
    
    public function staffProfile()
    {
        $staff = Auth::user();

    	return view('staff.profile',['staff'=>$staff]);
    }
}
