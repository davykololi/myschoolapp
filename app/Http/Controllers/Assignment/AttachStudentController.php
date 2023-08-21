<?php

namespace App\Http\Controllers\Assignment;

use App\Models\Assignment;
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
    	$assignment = Assignment::findOrFail($id);
    	$students = $request->students;
    	$assignment->students()->attach($students);

    	return back()->withSuccess('The students attached to the'." ".$assignment->name." ".'successfully');
    }
}
