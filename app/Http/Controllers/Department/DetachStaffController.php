<?php

namespace App\Http\Controllers\Department;

use App\Models\Department;
use App\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStaffController extends Controller
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

    public function detachStaff(Request $request,$id)
    {
    	$department = Department::findOrFail($id);
    	$staff = $request->staff;
    	$department->staffs()->detach($staff);

    	return back()->withSuccess('The substaff detached from the department successfully');
    }
}
