<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachAssignmentController extends Controller
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

    public function detachAssignment(Request $request,$id)
    {
    	$teacher = Teacher::findOrFail($id);
    	$assignment = $request->assignment;
    	$teacher->assignments()->detach($assignment);

    	return back()->withSuccess('The assignment detached from the teacher successfully');
    }
}
