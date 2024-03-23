<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Repositories\ExamRepository as ExamRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachSubjectController extends Controller
{
    protected $examRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExamRepo $examRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->examRepo = $examRepo;
    }

    public function attachDetachSubject(Request $request,$id)
    {
    	$exam = $this->examRepo->getId($id);
    	$subjects = $request->subjects;
    	$exam->subjects()->sync($subjects);

    	return back()->withSuccess('Done Successfully');
    }
}
