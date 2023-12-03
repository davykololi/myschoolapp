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
        $this->middleware('banned');
    }
    public function attachMeeting(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$meetings = $request->meetings;
    	$student->meetings()->attach($meetings);

    	return back()->withSuccess('The meetings attached to the student successfully');
    }
}
