<?php

namespace App\Http\Controllers\Admin\Student;

use App\Models\Student;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachSubjectController extends Controller
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

    public function attachDetachSubject(Request $request,$id)
    {
    	$student = Student::findOrFail($id);
    	$subjects = $request->subjects;
    	$student->subjects()->sync($subjects);

    	return back()->withSuccess('Done uccessfully');
    }
}
