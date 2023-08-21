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
        $this->middleware('auth:superadmin');
        $this->middleware('superadmin2fa');
        $this->deptRepo = $deptRepo;
    }

    public function attachStaff(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$staffs = $request->staffs;
    	$department->staffs()->sync($staffs);

    	return back()->withSuccess('The substaffs attached to the department successfully');
    }
}
