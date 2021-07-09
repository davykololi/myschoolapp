<?php

namespace App\Http\Controllers\Stream;

use App\Models\Teacher;
use App\Models\Stream;
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
    	$stream = Stream::findOrFail($id);
    	$teacher = $request->teacher;
    	$stream->teachers()->detach($teacher);

    	return back()->withSuccess('The teacher detached from the class successfully');
    }
}
