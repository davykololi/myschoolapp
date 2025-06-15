<?php

namespace App\Http\Controllers\Student;

use Auth;
use App\Models\Year;
use App\Models\Term;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Mark;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:student');
        $this->middleware('student-banned');
        $this->middleware('checktwofa');
    }
    
    public function studentProfile()
    {
        $user = Auth::user();
        $title = "Student Profile";

        $currentYear = date('Y');
        $year = Year::where('year',$currentYear)->first();
        $currentTerm = Term::where('status',1)->first();
        $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id,'results_published'=>1])->first();
        $streamSubjectFacilitators = $user->student->stream->stream_subjects()->with('teacher.user','stream','school','subject')->get();
        $vv = collect($user->student->stream->subjects()->pluck('name'));
        $streamSubjects = $vv->toArray(); 
        
        if(!is_null($currentExam)){
            $results = $currentExam->name." "."Results";
            return view('student.profile',compact('user','title','currentExam','results','streamSubjectFacilitators','streamSubjects'));
        }  

        return view('student.profile',compact('user','title','currentExam','streamSubjectFacilitators','streamSubjects'));
    }
}
