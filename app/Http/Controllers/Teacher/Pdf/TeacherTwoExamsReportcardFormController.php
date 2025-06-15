<?php

namespace App\Http\Controllers\Teacher\Pdf;

use App\Models\Year;
use App\Models\Term;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Teacher;
use App\Models\Student;
use App\Services\ClassService;
use App\Services\StreamService;
use App\Services\ExamService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherTwoExamsReportcardFormController extends Controller
{
    protected $classService, $streamService, $examService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClassService $classService, StreamService $streamService, ExamService $examService)
    {
        $this->middleware('auth');
        $this->middleware('role:teacher');
        $this->middleware('teacher-banned');
        $this->middleware('checktwofa');
        $this->classService = $classService;
        $this->streamService = $streamService;
        $this->examService = $examService;
    }

    public function twoExamsReportCardForm()
    {
        $classes = $this->classService->all();
        $streams = $this->streamService->all();
        $exams = $this->examService->all();
        $students = Student::with('school','libraries','teachers','stream','clubs','user')->get();
        $currentTerm = Term::where('status',1)->firstOrFail();
        $currentYear = Year::where('year',date("Y"))->firstOrFail();

        return view('teacher.pdf.twoexams_reportcardform',compact('classes','streams','exams','students','currentTerm','currentYear'));
    }
}
