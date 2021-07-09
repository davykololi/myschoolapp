<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachSubjectController extends Controller
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

    public function detachSubject(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$subject = $request->subject;
    	$student->subjects()->detach($subject);

    	return back()->withSuccess('The subject detached from the student successfully');
    }
}
