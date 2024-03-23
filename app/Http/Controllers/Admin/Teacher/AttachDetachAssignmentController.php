<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Models\Teacher;
use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachAssignmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }
    public function attachDetachAssignment(Request $request,$id)
    {
    	$teacher = Teacher::findOrFail($id);
    	$assignments = $request->assignments;
    	$teacher->assignments()->sync($assignments);

    	return back()->withSuccess('Done Successfully');
    }
}
