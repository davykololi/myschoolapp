<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
use App\Models\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachExamController extends Controller
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
    public function attachExam(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$exams = $request->exams;
    	$stream->exams()->attach($exams);

    	return back()->withSuccess('The exams attached to the class successfully');
    }
}
