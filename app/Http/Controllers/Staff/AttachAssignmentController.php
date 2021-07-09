<?php

namespace App\Http\Controllers\Staff;

use App\Models\Staff;
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
    }
    public function attachAssignment(Request $request,$id)
    {
    	$staff = Staff::findOrFail($id);
    	$assignment = $request->assignment;
    	$staff->assignments()->attach($assignment);

    	return back()->withSuccess('The assignment attached to the sub staff successfully');
    }
}
