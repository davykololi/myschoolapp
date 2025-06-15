<?php

namespace App\Http\Controllers\Superadmin\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachTeacherFromDeptController extends Controller
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
    public function detachTeacherFromDept(Request $request,$id)
    {
        $department = $this->deptRepo->getId($id);
        $teachers = $request->teachers;
        if(is_null($teachers)){
            return back()->withErrors('Please ensure you atleast select a teacher or teachers!');
        }
        $department->teachers()->detach($teachers);

        return back()->withSuccess('Done Successfully');
    }
}
