<?php

namespace App\Http\Controllers\Exam;

use App\Models\Exam;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachSubjectController extends Controller
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

    public function detachSubject(Request $request,$id)
    {
    	$exam = Exam::findOrFail($id);
    	$subject = $request->subject;
    	$exam->subjects()->detach($subject);

    	return back()->withSuccess('The subject detached from the exam successfully');
    }
}
