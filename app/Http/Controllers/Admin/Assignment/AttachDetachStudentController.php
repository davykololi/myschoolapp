<?php

namespace App\Http\Controllers\Admin\Assignment;

use App\Models\Assignment;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachStudentController extends Controller
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

    public function attachDetachStudent(Request $request,$id)
    {
    	$assignment = Assignment::findOrFail($id);
    	$students = $request->students;
    	$assignment->students()->sync($students);

    	return back()->withSuccess('Done Successfully');
    }
}
