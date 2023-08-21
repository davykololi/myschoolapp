<?php

namespace App\Http\Controllers\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachTeacherController extends Controller
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
    public function attachTeacher(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$teachers = $request->teachers;
    	$department->teachers()->sync($teachers);

    	return back()->withSuccess('The teachers attached to the department successfully');
    }
}
