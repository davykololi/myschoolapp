<?php

namespace App\Http\Controllers\Superadmin\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachSubStaffToDeptController extends Controller
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

    public function attachSubStaffToDept(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$subordinates = $request->subordinates;
        if(is_null($subordinates)){
            return back()->withErrors('Please ensure you select atleast a sub staff or sub staffs before you proceed!');
        }
    	$department->subordinates()->syncWithoutDetaching($subordinates);

    	return back()->withSuccess('Done Successfully');
    }
}
