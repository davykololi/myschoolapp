<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
use App\Models\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachExamController extends Controller
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

    public function detachExam(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$exam = $request->exam;
    	$stream->exams()->detach($exam);

    	return back()->withSuccess('The exam detached from the class successfully');
    }
}
