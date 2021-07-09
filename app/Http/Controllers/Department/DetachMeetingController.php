<?php

namespace App\Http\Controllers\Department;

use App\Models\Department;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachMeetingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function detachMeeting(Request $request,$id)
    {
    	$department = Department::findOrFail($id);
    	$meeting = $request->meeting;
    	$department->meetings()->detach($meeting);

    	return back()->withSuccess('The meeting detached from the department successfully');
    }
}
