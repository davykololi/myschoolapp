<?php

namespace App\Http\Controllers\Superadmin\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachTeacherController extends Controller
{
    protected $deptRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DeptRepo $deptRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->deptRepo = $deptRepo;
    }
    public function attachDetachTeacher(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$teachers = $request->teachers;
    	$department->teachers()->sync($teachers);

    	return back()->withSuccess('Done Successfully');
    }
}
