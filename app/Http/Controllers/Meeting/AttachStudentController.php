<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meeting;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStudentController extends Controller
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

    public function attachStudent(Request $request,$id)
    {
    	$meeting = Meeting::findOrFail($id);
    	$student = $request->student;
    	$meeting->students()->attach($student);

    	return back()->withSuccess('The student attached to the meeting successfully');
    }
}
