<?php

namespace App\Http\Controllers\Staff;

use App\Models\Staff;
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
    	$staff = Staff::findOrFail($id);
    	$assignment = $request->assignment;
    	$staff->assignments()->detach($assignment);

    	return back()->withSuccess('The assignment detached from the sub staff successfully');
    }
}
