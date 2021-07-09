<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachAssignmentController extends Controller
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

    public function detachAssignment(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$assignment = $request->assignment;
    	$student->assignments()->detach($assignment);

    	return back()->withSuccess('The assignment detached from the student successfully');
    }
}
