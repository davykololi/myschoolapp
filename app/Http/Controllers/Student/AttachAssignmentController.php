<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachAssignmentController extends Controller
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
    public function attachAssignment(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$assignments = $request->assignments;
    	$student->assignments()->sync($assignments);

    	return back()->withSuccess('The assignments attached to the student successfully');
    }
}
