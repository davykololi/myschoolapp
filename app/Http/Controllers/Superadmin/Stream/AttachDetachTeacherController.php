<?php

namespace App\Http\Controllers\Superadmin\Stream;

use App\Models\Teacher;
use App\Models\Stream;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachTeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
    }
    public function attachDetachTeacher(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$teachers = $request->teachers;
    	$stream->teachers()->sync($teachers);

    	return back()->withSuccess('Done Successfully');
    }
}
