<?php

namespace App\Http\Controllers\Teacher;

use Auth;
use App\Models\Teacher;
use App\Models\Stream;
use App\Models\Student;
use App\Models\Department;
use App\Models\PositionTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
    	return view('teacher');
    }

    public function schoolTeachers()
    {
        $user = Auth::user();
        $principal = PositionTeacher::whereName('The Principal')->first();
        $headTeachers = $principal->teachers()->with('position_teacher')->get();

        $deputy = PositionTeacher::whereName('The Deputy Principal')->first();
        $deputyHeadTeachers = $deputy->teachers()->with('position_teacher')->get();

        $scienceDept = Department::whereName('Science Department')->first();
        $scienceDeptHead = PositionTeacher::whereName('The Head Science Department')->first();
        $scienceDeptHeadTeachers = $scienceDeptHead->teachers()->with('position_teacher')->get();
        $scienceDeptAssHead = PositionTeacher::whereName('The Assistant Head Science Department')->first();
        $scienceDeptAssHeadTeachers = $scienceDeptAssHead->teachers()->with('position_teacher')->get();
        $scienceDeptTeachers = $scienceDept->teachers()->with('position_teacher')->get();
        
        return view('teacher.school_teachers',['user'=>$user,'headTeachers'=>$headTeachers,'deputyHeadTeachers'=>$deputyHeadTeachers,'scienceDept'=>$scienceDept,'scienceDeptHeadTeachers'=>$scienceDeptHeadTeachers,'scienceDeptAssHeadTeachers'=>$scienceDeptAssHeadTeachers,'scienceDeptTeachers'=>$scienceDeptTeachers]);
    }

    public function showTeacher(Teacher $teacher)
    {
        
        return view('teacher.show_teacher',compact('teacher'));
    }

    public function streams(Request $request)
    {
        $user = Auth::user();
        $streams = Stream::all();
        
        return view('teacher.streams',['user'=>$user,'streams'=>$streams]);
    }

    public function showStream(Stream $stream)
    {
        return view('teacher.show_stream',compact('stream'));
    }

    public function showStudent(Student $student)
    {
        return view('teacher.show_student',compact('student'));
    }

    public function departments()
    {
        $user = Auth::user();
        $departments = Department::all();
        
        return view('teacher.departments',compact('user','departments'));
    }

    public function showDepartment(Department $department)
    {
        return view('teacher.show_department',compact('department'));
    }

    public function teacherRewards()
    {
        $user = auth()->user();
        
        return view('teacher.teacher_rewards',['user'=>$user]);
    }
}
