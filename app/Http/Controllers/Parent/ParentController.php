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
        $this->middleware('auth');
        $this->middleware('role:parent');
        $this->middleware('parent-banned');
        $this->middleware('checktwofa');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parent.parent');
    }

    public function parentChildren()
    {
        $user = Auth::user();
        $parentChildren = $user->parent->children()->with('school','libraries','teachers','stream','clubs','payments','payment_records','user')->get();

        return view('parent.children',compact('user','parentChildren'));
    }

    public function showChild(Student $child)
    {
        $currentYear = date('Y');
        $year = Year::where('year',$currentYear)->first();
        $currentTerm = Term::where('status',1)->first();

        if(!$currentTerm){
            return back()->withErrors('Major details notyet set. Keep checking later!');
        }

        $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id,'results_published'=>1])->first();
        $vv = collect($child->stream->subjects()->pluck('name'));
        $streamSubjects = $vv->toArray();

        $childAwards = $child->awards()->with('student.user')->get();
        $childAsignments = $child->assignments()->with('student.user','teacher')->get();
        $childClubs = $child->clubs()->with('student.user')->get();
        $childMeetings = $child->meetings()->with('student.user')->get();

        if(!is_null($currentExam)){
            $results = $currentExam->name." "."Results";
            return view('parent.show_child',compact('child','streamSubjects','currentExam','streamSubjects','results','childAwards','childAsignments','childClubs','childMeetings'));
        }

        return view('parent.show_child',compact('child','streamSubjects','currentExam','childAwards','childAsignments','childClubs','childMeetings'));
    }

    public function studentStream(Stream $stream)
    {
        $streamSubjects = $stream->stream_subjects()->with('teacher.user','subject')->get();

        return view('parent.student_stream',compact('stream','streamSubjects'));
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
