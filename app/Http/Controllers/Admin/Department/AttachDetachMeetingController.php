<?php

namespace App\Http\Controllers\Admin\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachMeetingController extends Controller
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
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->deptRepo = $deptRepo;
    }

    public function attachDetachMeeting(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$meetings = $request->meetings;
    	$department->meetings()->sync($meetings);

    	return back()->withSuccess('Done Successfully');
    }
}
