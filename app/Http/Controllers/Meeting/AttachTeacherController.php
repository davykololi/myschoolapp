<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meeting;
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
    	$meeting = Meeting::findOrFail($id);
    	$teacher = $request->teacher;
    	$meeting->teachers()->attach($teacher);

    	return back()->withSuccess('The teacher attached to the meeting successfully');
    }
}
