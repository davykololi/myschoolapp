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
use App\Models\StreamSubjectTeacher;
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
        $this->middleware('auth:teacher');
        $this->middleware('teacher2fa');
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
        
        return view('teacher.school_teachers',['user'=>$user]);
    }

    public function showTeacher(Teacher $teacher)
    {
        
        return view('teacher.show_teacher',compact('teacher'));
    }

    public function streams(Request $request)
    {
        $user = Auth::user();
        $streams = $this->streamService->all();
        $streamSubjectTeacher = StreamSubjectTeacher::where(['teacher_id'=>$user->id])->first();
        
        return view('teacher.streams',['user'=>$user,'streams'=>$streams,'streamSubjectTeacher'=>$streamSubjectTeacher]);
    }

    public function showStream(Stream $stream)
    {
        $user = Auth::user();
        $strmSubjectTeachers = $stream->stream_subject_teachers()->with('teacher.streams','stream','school','subject')->get();
        $streamSubjectTeacher = StreamSubjectTeacher::with('teacher.streams','stream','school','subject')->where(['teacher_id'=>$user->id,'stream_id'=>$stream->id])->first();

        if($streamSubjectTeacher === null){
            return redirect()->route('teacher.streams')->withErrors("Not Authorized");
        }
        $subjects = Subject::with('teachers','students','school','department')->get();
        
        return view('teacher.show_stream',compact('user','strmSubjectTeachers','streamSubjectTeacher','stream','subjects')); 
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
        
        return view('teacher.show_department',compact('department'));
    }
}
