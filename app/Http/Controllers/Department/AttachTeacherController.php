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
        $this->middleware('auth:admin');
        $this->deptRepo = $deptRepo;
    }
    public function attachTeacher(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$teacher = $request->teacher;
    	$department->teachers()->attach($teacher);

    	return back()->withSuccess('The teacher attached to the department successfully');
    }
}
