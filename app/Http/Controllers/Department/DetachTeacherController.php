<?php

namespace App\Http\Controllers\Department;

use App\Models\Department;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachTeacherController extends Controller
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

    public function detachTeacher(Request $request,$id)
    {
    	$department = Department::findOrFail($id);
    	$teacher = $request->teacher;
    	$department->teachers()->detach($teacher);

    	return back()->withSuccess('The teacher detached from the department successfully');
    }
}
