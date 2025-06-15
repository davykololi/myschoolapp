<?php

namespace App\Http\Controllers\Admin;

use App\Services\ExamService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamResultsPublishStatusController extends Controller
{
    protected $examService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExamService $examService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->examService = $examService;
    }

    public function examResultsPublished($id)
    {
        $exam = $this->examService->getId($id);
        $exam->results_published = true;
        $exam->save();

        return back()->withSuccess($exam->name." "."results published successfully");
    }

    public function examResultsUnPublished($id)
    {
        $exam = $this->examService->getId($id);
        $exam->results_published = false;
        $exam->save();

        return back()->withSuccess($exam->name." "."results unpublished successfully");
    }
}
