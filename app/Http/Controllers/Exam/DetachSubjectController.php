<?php

namespace App\Http\Controllers\Exam;

use App\Repositories\ExamRepository as ExamRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachSubjectController extends Controller
{
    protected $examRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExamRepo $examRepo)
    {
        $this->middleware('auth:admin');
        $this->examRepo = $examRepo;
    }

    public function detachSubject(Request $request,$id)
    {
    	$exam = $this->examRepo->getId($id);
    	$subject = $request->subject;
    	$exam->subjects()->detach($subject);

    	return back()->withSuccess('The subject detached from the exam successfully');
    }
}
