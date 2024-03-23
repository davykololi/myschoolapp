<?php

namespace App\Http\Controllers\Admin\Student;

use App\Models\Student;
use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachAssignmentController extends Controller
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
    public function attachDetachAssignment(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$assignments = $request->assignments;
    	$student->assignments()->sync($assignments);

    	return back()->withSuccess('Done uccessfully');
    }
}
