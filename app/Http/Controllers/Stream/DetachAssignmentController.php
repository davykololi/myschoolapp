<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
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
    	$stream = Stream::findOrFail($id);
    	$assignment = $request->assignment;
    	$stream->assignments()->detach($assignment);

    	return back()->withSuccess('The assignment detached from the class successfully');
    }
}
