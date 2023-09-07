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
        $this->middleware('banned');
        $this->examRepo = $examRepo;
    }

    public function attachSubject(Request $request,$id)
    {
    	$exam = $this->examRepo->getId($id);
    	$subjects = $request->subjects;
    	$exam->subjects()->attach($subjects);

    	return back()->withSuccess('The subjects attached to the'." ".$exam->name." ".'successfully');
    }
}
