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
    	$teachers = $request->teachers;
    	$stream->teachers()->sync($teachers);

    	return back()->withSuccess('The teachers attached to the class successfully');
    }
}
