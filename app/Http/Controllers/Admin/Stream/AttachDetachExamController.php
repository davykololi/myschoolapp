<?php

namespace App\Http\Controllers\Admin\Stream;

use App\Models\Stream;
use App\Models\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachExamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }
    public function attachDetachExam(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$exams = $request->exams;
    	$stream->exams()->attach($exams);

    	return back()->withSuccess('Done Successfully');
    }
}
