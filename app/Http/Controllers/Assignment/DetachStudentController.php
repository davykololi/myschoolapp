<?php

namespace App\Http\Controllers\Assignment;

use App\Models\Assignment;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStudentController extends Controller
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

    public function detachStudent(Request $request,$id)
    {
    	$assignment = Assignment::findOrFail($id);
    	$student = $request->student;
    	$assignment->students()->detach($student);

    	return back()->withSuccess('The student detached from the assignment successfully');
    }
}
