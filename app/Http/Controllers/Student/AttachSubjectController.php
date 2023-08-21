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
    	$subjects = $request->subjects;
    	$student->subjects()->attach($subjects);

    	return back()->withSuccess('The subjects attached to the student successfully');
    }
}
