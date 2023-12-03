<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachAssignmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('teacher2fa');
    }
    public function attachAssignment(Request $request,$id)
    {
    	$teacher = Teacher::findOrFail($id);
    	$assignments = $request->assignments;
    	$teacher->assignments()->sync($assignments);

    	return back()->withSuccess('The assignments attached to the teacher successfully');
    }
}
