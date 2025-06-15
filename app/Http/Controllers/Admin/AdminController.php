<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\Models\Student;
use App\Models\Year;
use App\Models\Term;
use App\Models\Exam;
use App\Charts\StudentsChart;
use App\Charts\TeachersChart;
use App\Services\ClassService;
use App\Services\StreamService;
use App\Services\DormitoryService;
use App\Services\DepartmentService;
use App\Services\ClubService;
use App\Services\StudentService;
use App\Services\SubordinateService;
use App\Services\ExamService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $classService, $streamService, $dormService, $deptService, $clubService, $studentService, $subordinateService, $examService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( ClassService $classService, StreamService $streamService, DormitoryService $dormService, DepartmentService $deptService, ClubService $clubService, StudentService $studentService, SubordinateService $subordinateService, ExamService $examService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->classService = $classService;
        $this->streamService = $streamService;
        $this->dormService = $dormService;
        $this->deptService = $deptService;
        $this->clubService = $clubService;
        $this->studentService = $studentService;
        $this->subordinateService = $subordinateService;
        $this->examService = $examService;
    }

    public function index(StudentsChart $studentsChart, TeachersChart $teachersChart,)
    {
        $user = Auth::user();
        if($user->hasRole('admin')){
            $allStudents = $this->studentService->all()->count();
            $females = $this->studentService->all()->where('gender','Female')->count();
            $males = $this->studentService->all()->where('gender','Male')->count();

            // Replace this with your actual data retrieval logic
            $data = [
                'labels' => ['Females','Males'],
                'data' => [$females, $males],
            ];

            return view('admin.admin',['allStudents'=>$allStudents,'females'=>$females,'males'=>$males,'studentsChart'=>$studentsChart->build(),'teachersChart'=>$teachersChart->build(),'data'=>$data]);
        }
    }

    public function adminProfile()
    {
    	$user = Auth::user();
        if($user->hasRole('admin')){
            return view('admin.profile.profile',compact('user'));
        }
    }

    public function schoolPdfDocs()
    {
        $user = Auth::user();
        if($user->hasRole('admin')){
            $classes = $this->classService->all();
            $streams = $this->streamService->all();
            $dormitories = $this->dormService->all();
            $departments = $this->deptService->all();
            $clubs = $this->clubService->all();
            $students = $this->studentService->all();
            $subordinates = $this->subordinateService->all();

            $currentYear = date('Y');
            $year = Year::where('year',$currentYear)->first();
            $currentTerm = Term::where('status',1)->first();
            $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id,'results_published'=>1])->first();
            if(!is_null($currentExam)){
                $results = $currentExam->name." "."Result Slips";
                return view('admin.pdf.school_pdf_docs',compact('classes','streams','dormitories','departments','clubs','students','subordinates','currentExam','results'));
            }

            return view('admin.pdf.school_pdf_docs',compact('classes','streams','dormitories','departments','clubs','students','subordinates','currentExam'));
        }
    }

    public function currentExam($id)
    {
        $exam = $this->examService->getId($id);
        $exam->status = 1;
        $exam->save();

        return back()->withSuccess($exam->name." "."updated successfully as current term");
    }

    public function reservedExam($id)
    {
        $exam = $this->examService->getId($id);
        $exam->status = 0;
        $exam->save();

        return back()->withSuccess($exam->name." "."updated successfully as reserved term");
    }
}
