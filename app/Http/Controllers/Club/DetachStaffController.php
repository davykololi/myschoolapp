<?php

namespace App\Http\Controllers\Club;

use App\Models\Club;
use App\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStaffController extends Controller
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

    public function detachStaff(Request $request,$id)
    {
    	$club = Club::findOrFail($id);
    	$staff = $request->staff;
    	$club->staffs()->detach($staff);

    	return back()->withSuccess('The substaff detached from the club successfully');
    }
}
