<?php

namespace App\Http\Controllers\Admin;

use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadAssignmentController extends Controller
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
    
    public function dowmloadAssignment($assignmentId)
    {
    	$assignment = Assignment::where('id',$assignmentId)->firstOrFail();
    	$path = public_path().'/storage/files/'.$assignment->file;

    	return response()->download($path);
    }
}
