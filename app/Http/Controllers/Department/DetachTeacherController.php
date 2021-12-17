<?php

namespace App\Http\Controllers\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachTeacherController extends Controller
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

    public function detachTeacher(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$teacher = $request->teacher;
    	$department->teachers()->detach($teacher);

    	return back()->withSuccess('The teacher detached from the department successfully');
    }
}
