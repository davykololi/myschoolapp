<?php

namespace App\Http\Controllers\Matron;

use Auth;
use App\Models\BedNumber;
use App\Models\Student;
use App\Services\SchoolService;
use App\Services\DormitoryService;
use App\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatronController extends Controller
{
    protected $schService,$dormService,$studentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchoolService $schService,DormitoryService $dormService,StudentService $studentService)
    {
        $this->middleware('auth');
        $this->middleware('role:matron');
        $this->middleware('matron-banned');
        $this->middleware('checktwofa');
        $this->schService = $schService;
        $this->dormService = $dormService;
        $this->studentService = $studentService;
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('matron')){
            return view('matron.matron');
        }
    }

    public function dormitories()
    {
        $user = Auth::user();
        if($user->hasRole('matron')){
            $school = Auth::user()->school;
            $dormitories = $school->dormitories()->with('school','students')->get();

            return view('matron.dormitories',compact('school','dormitories'));
        }
    }

    public function dormitory($id)
    {
        $user = Auth::user();
        if($user->hasRole('matron')){
            $dormitory = $this->dormService->getId($id);
            $dormitoryStudents = $dormitory->students()->with('stream','user','bed_number')->get();

            return view('matron.dormitory',compact('dormitory','dormitoryStudents'));
        }
    }

    public function dormitoryQueries()
    {
        $user = Auth::user();
        if($user->hasRole('matron')){
            $dormitories = $this->dormService->all();
            $students = $this->studentService->all();

            return view('matron.dormitories.dormitory_queries',compact('dormitories','students'));
        }
    }

    public function studentBedNumber(Request $request)
    {
        $user = Auth::user();
        if($user->hasRole('matron')){
            $number = $request->number;
            $studentId = $request->student_id;
            $student = Student::where('id',$studentId)->first();
            $dormitoryId = $student->dormitory_id;
        
            $bedNumber = BedNumber::upsert([
                            'number' => $number,
                            'student_id' => $studentId,
                            'dormitory_id' => $dormitoryId,
                ],['student_id'],['number','dormitory_id']);

            return back()->withSuccess('Done successfully');  
        }  
    }
}
