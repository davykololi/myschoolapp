<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
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
    	$stream = Stream::findOrFail($id);
    	$assignment = $request->assignment;
    	$stream->assignments()->attach($assignment);

    	return back()->withSuccess('The assignment attached to the class successfully');
    }
}
