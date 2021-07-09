<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meeting;
use App\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStaffController extends Controller
{
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
    	$meeting = Meeting::findOrFail($id);
    	$staff = $request->staff;
    	$meeting->staffs()->attach($staff);

    	return back()->withSuccess('The substaff attached to the meeting successfully');
    }
}
