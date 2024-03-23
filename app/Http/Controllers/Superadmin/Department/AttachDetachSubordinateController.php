<?php

namespace App\Http\Controllers\Superadmin\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachSubordinateController extends Controller
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

    public function attachDetachSubordinate(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$subordinates = $request->subordinates;
    	$department->subordinates()->sync($subordinates);

    	return back()->withSuccess('Done Successfully');
    }
}
