<?php

namespace App\Http\Controllers\Club;

use App\Models\Club;
use App\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStaffController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function attachStaff(Request $request,$id)
    {
    	$club = Club::findOrFail($id);
    	$staff = $request->staff;
    	$club->staffs()->attach($staff);

    	return back()->withSuccess('The substaff attached to the club successfully');
    }
}
