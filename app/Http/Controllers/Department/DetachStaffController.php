<?php

namespace App\Http\Controllers\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStaffController extends Controller
{
    protected $deptRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DeptRepo $deptRepo)
    {
        $this->middleware('auth:admin');
        $this->deptRepo = $deptRepo;
    }

    public function detachStaff(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$staff = $request->staff;
    	$department->staffs()->detach($staff);

    	return back()->withSuccess('The substaff detached from the department successfully');
    }
}
