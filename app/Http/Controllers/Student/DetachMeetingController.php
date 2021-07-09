<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
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
    	$student = Student::findOrFail($id);
    	$meeting = $request->meeting;
    	$student->meetings()->detach($meeting);

    	return back()->withSuccess('The meeting detached from the student successfully');
    }
}
