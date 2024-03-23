<?php

namespace App\Http\Controllers\Admin\Stream;

use App\Models\Stream;
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
        $this->middleware('admin');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }
    public function attachDetachAssignment(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$assignments = $request->assignments;
    	$stream->assignments()->attach($assignments);

    	return back()->withSuccess('Successfully Done');
    }
}
