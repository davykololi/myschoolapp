<?php

namespace App\Http\Controllers\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStaffController extends Controller
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

    public function attachStaff(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$staff = $request->staff;
    	$department->staffs()->attach($staff);

    	return back()->withSuccess('The substaff attached to the department successfully');
    }
}
