<?php

namespace App\Http\Controllers\Exam;

use App\Repositories\ExamRepository as ExamRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachSubjectController extends Controller
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

    public function attachSubject(Request $request,$id)
    {
    	$exam = $this->examRepo->getId($id);
    	$subject = $request->subject;
    	$exam->subjects()->attach($subject);

    	return back()->withSuccess('The subject attached to the exam successfully');
    }
}
