<?php

namespace App\Http\Controllers\Admin\Student;

use App\Models\Student;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachMeetingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }
    public function attachDetachMeeting(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$meetings = $request->meetings;
    	$student->meetings()->sync($meetings);

    	return back()->withSuccess('Done Successfully');
    }
}
