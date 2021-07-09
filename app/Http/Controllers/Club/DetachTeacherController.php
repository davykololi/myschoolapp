<?php

namespace App\Http\Controllers\Club;

use App\Models\Club;
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
    	$club = Club::findOrFail($id);
    	$teacher = $request->teacher;
    	$club->teachers()->detach($teacher);

    	return back()->withSuccess('The teacher detached from the club successfully');
    }
}
