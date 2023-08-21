<?php

namespace App\Http\Controllers\Parent;

use Auth;
use App\Models\Student;
use App\Models\Stream;
use App\Models\Department;
use App\Models\Teacher;
use App\Models\Year;
use App\Models\Term;
use App\Models\Exam;
use App\Models\PositionTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:parent');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parent');
    }

    public function parentChildren()
    {
        $user = Auth::user();
        $parentChildren = $user->children()->with('school','libraries','teachers','class','stream','clubs','payments','payment_records')->get();

        return view('parent.students',compact('user','parentChildren'));
    }

    public function showChild(Student $child)
    {
        $currentYear = date('Y');
        $year = Year::where('year',$currentYear)->first();
        $currentTerm = Term::where('status',1)->first();
        $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id])->first();
        $vv = collect($child->stream->subjects()->pluck('name'));
        $streamSubjects = $vv->toArray();

        if(!is_null($currentExam)){
            $results = $currentExam->name." "."Results";
            return view('parent.show_student',compact('child','streamSubjects','currentExam','streamSubjects','results'));
        }

        return view('parent.show_student',compact('child','streamSubjects','currentExam'));
    }

    public function studentStream(Stream $stream)
    {
        $standardSubjects = $stream->standard_subjects;

        return view('parent.student_stream',compact('stream','standardSubjects'));
    }

    public function schoolTeachers()
    {
        $user = Auth::user();
        $principal = Teacher::whereRole('headteacher')->first();

        $deputy = Teacher::whereRole('deputyheadteacher')->first();

        $scienceDept = Department::whereName('Science Department')->first();
        $scienceDeptHead = PositionTeacher::whereName('The Head Science Department')->first();
        $scienceDeptHeadTeachers = $scienceDeptHead->teachers()->with('position_teacher')->get();
        $scienceDeptAssHead = PositionTeacher::whereName('The Assistant Head Science Department')->first();
        $scienceDeptAssHeadTeachers = $scienceDeptAssHead->teachers()->with('position_teacher')->get();
        $scienceDeptTeachers = $scienceDept->teachers()->with('position_teacher')->get();

        return view('parent.school_teachers',compact('user','headTeachers','deputyHeadTeachers','scienceDept','scienceDeptHeadTeachers','scienceDeptAssHeadTeachers','scienceDeptTeachers'));
    }

    public function showTeacher(Teacher $teacher)
    {
    	return view('parent.show_teacher',compact('teacher'));
    }
}
