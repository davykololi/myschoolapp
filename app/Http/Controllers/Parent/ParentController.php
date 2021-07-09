<?php

namespace App\Http\Controllers\Parent;

use Auth;
use App\Models\Student;
use App\Models\Stream;
use App\Models\Department;
use App\Models\Teacher;
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

    public function parentStudents()
    {
        $user = Auth::user();
        $students = $user->students;

        return view('parent.students',compact('user','students'));
    }

    public function showStudent(Student $student)
    {

        return view('parent.show_student',compact('student'));
    }

    public function studentStream(Stream $stream)
    {
        $standardSubjects = $stream->standard_subjects;

        return view('parent.student_stream',compact('stream','standardSubjects'));
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

        return view('parent.school_teachers',compact('user','headTeachers','deputyHeadTeachers','scienceDept','scienceDeptHeadTeachers','scienceDeptAssHeadTeachers','scienceDeptTeachers'));
    }

    public function showTeacher(Teacher $teacher)
    {
    	return view('parent.show_teacher',compact('teacher'));
    }
}
