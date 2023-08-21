<?php

namespace App\Http\Controllers\Department;

use App\Repositories\DepartmentRepository as DeptRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachMeetingController extends Controller
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

    public function attachMeeting(Request $request,$id)
    {
    	$department = $this->deptRepo->getId($id);
    	$meetings = $request->meetings;
    	$department->meetings()->sync($meetings);

    	return back()->withSuccess('The meetings attached to the department successfully');
    }
}
