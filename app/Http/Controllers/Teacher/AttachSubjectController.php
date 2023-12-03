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
        $this->middleware('teacher2fa');
    }
    public function attachSubject(Request $request,$id)
    {
    	$teacher = Teacher::findOrFail($id);
    	$subjects = $request->subjects;
    	$teacher->subjects()->sync($subjects);

    	return back()->withSuccess('The subjects attached to the teacher successfully');
    }
}
