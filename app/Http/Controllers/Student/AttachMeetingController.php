<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachMeetingController extends Controller
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
    public function attachMeeting(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$meeting = $request->meeting;
    	$student->meetings()->attach($meeting);

    	return back()->withSuccess('The meeting attached to the student successfully');
    }
}
