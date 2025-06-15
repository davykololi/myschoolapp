<?php

namespace App\Http\Controllers\Teacher;

use Auth;
use SEOMeta;
use OpenGraph;
use Twitter;
use JsonLd;
use App\Models\Teacher;
use App\Services\StreamService;
use App\Models\Student;
use App\Services\DepartmentService;
use App\Models\Subject;
use App\Models\Stream;
use App\Models\StreamSubject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $streamService, $deptService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, StreamService $streamService, DepartmentService $deptService)
    {
        $this->middleware('auth');
        $this->middleware('role:teacher');
        $this->middleware('teacher-banned');
        $this->middleware('checktwofa');
        $this->request = $request;
        $this->streamService = $streamService;
        $this->deptService = $deptService;
    }

    public function index()
    {
    	return view('teacher.teacher');
    }

    public function schoolTeachers()
    {
        $user = Auth::user();
        $schoolTeachers = $user->school->teachers()->with('user')->get();
        
        return view('teacher.school_teachers',compact('user','schoolTeachers'));
    }

    public function showTeacher(Teacher $teacher)
    {
        
        return view('teacher.show_teacher',compact('teacher'));
    }

    public function streams(Request $request)
    {
        $user = Auth::user();
        $search = strtolower($request->search);
        if($user->hasRole('teacher')){
            if($search){
                $streams = Stream::whereLike(['class.name', 'class.initials', 'name', 'class_teacher', 'class_prefect','code'], $search)->eagerLoaded()->paginate(15);
                $streamTeacher = StreamSubject::where('teacher_id',$user->teacher->id)->firstOrFail();
                $teacherStreamSubjects = $streamTeacher->teacher->stream_subjects()->with('teacher','stream','subject')->get();
        
                return view('teacher.streams',compact('user','streams','streamTeacher','teacherStreamSubjects'));
            } else {
                $streams = $this->streamService->paginated();
                $streamTeacher = StreamSubject::where('teacher_id',$user->teacher->id)->firstOrFail();
                $teacherStreamSubjects = $streamTeacher->teacher->stream_subjects()->with('teacher','stream','subject')->get();
        
                return view('teacher.streams',compact('user','streams','streamTeacher','teacherStreamSubjects'));
            }
        }
        
    }

    public function showStream(Stream $stream)
    {
        $user = Auth::user();
        $streamSubject = StreamSubject::with('teacher.streams','teacher.user','stream','school','subject')->where(['teacher_id'=>$user->teacher->id,'stream_id'=>$stream->id])->first();
        $teacherStreamSubjects = $stream->stream_subjects()->with('teacher.user','stream','subject')->get();

        if($streamSubject === null){
            $authUserDetails = Auth::user()->salutation." ".Auth::user()->first_name;
            return redirect()->route('teacher.streams')->with("error","Sorry"." ".$authUserDetails."You haven't been assigned to this class, therefore access denied!");
        }
        $streamSubjects = $stream->subjects()->eagerLoaded()->get();
        $streamTimetables = $stream->timetables()->with('stream')->get();
        $teacherNotes = $streamSubject->teacher->notes()->with('subject.department','stream')->get();
        $streamStudents = $stream->students()->with('user')->get();
        
        return view('teacher.show_stream',compact('user','teacherStreamSubjects','streamSubject','stream','streamSubjects','streamTimetables','teacherNotes','streamStudents')); 
    }

    public function showStudent(Student $student)
    {
        return view('teacher.show_student',compact('student'));
    }

    public function departments()
    {
        $user = Auth::user();
        $departments = $this->deptService->all();
        
        return view('teacher.departments',compact('user','departments'));
    }

    public function showDepartment($id)
    {  
        $department = $this->deptService->getId($id);
        $departmentTeachers = $department->teachers()->with('user')->get();
        $departmentSubordinates = $department->subordinates()->with('user')->get();
        $departmentMeetings = $department->meetings()->with('teacher.user','student.user')->get();
        
        return view('teacher.show_department',compact('department','departmentTeachers','departmentSubordinates','departmentMeetings'));
    }
}
