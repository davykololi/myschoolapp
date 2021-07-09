<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachSubjectController extends Controller
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

    public function attachSubject(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$subject = $request->subject;
    	$student->subjects()->attach($subject);

    	return back()->withSuccess('The subject attached to the student successfully');
    }
}
