<?php

namespace App\Http\Controllers\Club;

use App\Models\Club;
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
    	$club = Club::findOrFail($id);
    	$student = $request->student;
    	$club->students()->attach($student);

    	return back()->withSuccess('The student attached to the club successfully');
    }
}
