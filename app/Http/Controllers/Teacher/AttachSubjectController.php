<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachSubjectController extends Controller
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
    public function attachSubject(Request $request,$id)
    {
    	$teacher = Teacher::findOrFail($id);
    	$subject = $request->subject;
    	$teacher->subjects()->attach($subject);

    	return back()->withSuccess('The subject attached to the teacher successfully');
    }
}
