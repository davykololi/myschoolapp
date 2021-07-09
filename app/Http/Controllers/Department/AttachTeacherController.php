<?php

namespace App\Http\Controllers\Department;

use App\Models\Department;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachTeacherController extends Controller
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
    public function attachTeacher(Request $request,$id)
    {
    	$department = Department::findOrFail($id);
    	$teacher = $request->teacher;
    	$department->teachers()->attach($teacher);

    	return back()->withSuccess('The teacher attached to the department successfully');
    }
}
