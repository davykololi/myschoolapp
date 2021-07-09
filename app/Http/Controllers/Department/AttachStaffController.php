<?php

namespace App\Http\Controllers\Department;

use App\Models\Department;
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
    	$department = Department::findOrFail($id);
    	$staff = $request->staff;
    	$department->staffs()->attach($staff);

    	return back()->withSuccess('The substaff attached to the department successfully');
    }
}
