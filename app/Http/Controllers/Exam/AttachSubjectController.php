<?php

namespace App\Http\Controllers\Exam;

use App\Models\Exam;
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
    	$exam = Exam::findOrFail($id);
    	$subject = $request->subject;
    	$exam->subjects()->attach($subject);

    	return back()->withSuccess('The subject attached to the exam successfully');
    }
}
