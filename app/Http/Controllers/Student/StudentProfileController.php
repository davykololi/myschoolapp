<?php

namespace App\Http\Controllers\Student;

use Auth;
use App\Models\Year;
use App\Models\Term;
use App\Models\Stream;
use App\Models\Exam;
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
        $this->middleware('auth:student');
        $this->middleware('banned');
        $this->middleware('student2fa');
    }
    
    public function studentProfile()
    {
        $user = Auth::user();
        $title = "Student Profile";

        $currentYear = date('Y');
        $year = Year::where('year',$currentYear)->first();
        $currentTerm = Term::where('status',1)->first();
        $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id])->first();
        $strmSubjectTeachers = $user->stream->stream_subject_teachers()->with('teacher','stream','school','subject')->get();
        $vv = collect($user->stream->subjects()->pluck('name'));
        $streamSubjects = $vv->toArray();
        
        if(!is_null($currentExam)){
            $results = $currentExam->name." "."Results";
            return view('student.profile',compact('user','title','currentExam','results','strmSubjectTeachers','streamSubjects'));
        }

        return view('student.profile',compact('user','title','currentExam','strmSubjectTeachers','streamSubjects'));
    }
}
