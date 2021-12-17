<?php

namespace App\Http\Controllers\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachMeetingController extends Controller
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

    public function detachMeeting(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$meeting = $request->meeting;
    	$department->meetings()->detach($meeting);

    	return back()->withSuccess('The meeting detached from the department successfully');
    }
}
