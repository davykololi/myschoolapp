<?php

namespace App\Http\Controllers\Club;

use App\Models\Club;
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
    	$club = Club::findOrFail($id);
    	$student = $request->student;
    	$club->students()->detach($student);

    	return back()->withSuccess('The student detached from the club successfully');
    }
}
