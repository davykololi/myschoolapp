<?php

namespace App\Http\Controllers\Stream;

use App\Models\Teacher;
use App\Models\Stream;
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
    	$stream = Stream::findOrFail($id);
    	$teacher = $request->teacher;
    	$stream->teachers()->attach($teacher);

    	return back()->withSuccess('The teacher attached to the class successfully');
    }
}
