<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\Models\Student;
use App\Models\Year;
use App\Models\Term;
use App\Models\Exam;
use App\Charts\StudentsChart;
use App\Services\ClassService;
use App\Services\StreamService;
use App\Services\DormitoryService;
use App\Services\DepartmentService;
use App\Services\ClubService;
use App\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $classService, $streamService, $dormService, $deptService, $clubService, $studentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( ClassService $classService, StreamService $streamService, DormitoryService $dormService, DepartmentService $deptService, ClubService $clubService, StudentService $studentService)
    {
        $this->middleware('auth:admin');
        $this->middleware('banned');
        $this->middleware('admin2fa');
        $this->classService = $classService;
        $this->streamService = $streamService;
        $this->dormService = $dormService;
        $this->deptService = $deptService;
        $this->clubService = $clubService;
        $this->studentService = $studentService;
    }

    public function index(StudentsChart $chart)
    {
        $allStudents = $this->studentService->all()->count();
        $females = $this->studentService->all()->where('gender','Female')->count();
        $males = $this->studentService->all()->where('gender','Male')->count();

    	return view('admin.admin',['allStudents'=>$allStudents,'females'=>$females,'males'=>$males,'chart'=>$chart->build()]);
    }

    public function adminProfile()
    {
    	$admin = Auth::user();

    	return view('admin.profile.profile',compact('admin'));
    }

    public function schoolPdfDocs()
    {
        $classes = $this->classService->all();
        $streams = $this->streamService->all();
        $dormitories = $this->dormService->all();
        $departments = $this->deptService->all();
        $clubs = $this->clubService->all();
        $students = $this->studentService->all();

        $currentYear = date('Y');
        $year = Year::where('year',$currentYear)->first();
        $currentTerm = Term::where('status',1)->first();
        $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id])->first();
        if(!is_null($currentExam)){
            $results = $currentExam->name." "."Results";
            return view('admin.pdf.school_pdf_docs',compact('classes','streams','dormitories','departments','clubs','students','currentExam','results'));
        }

        return view('admin.pdf.school_pdf_docs',compact('classes','streams','dormitories','departments','clubs','students','currentExam'));
    }
}
