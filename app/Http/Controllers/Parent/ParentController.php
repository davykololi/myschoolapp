<?php

namespace App\Http\Controllers\Parent;

use Auth;
use App\Repositories\StudentRepository as StudentRepo;
use App\Repositories\StreamRepository as StreamRepo;
use App\Repositories\DepartmentRepository as DeptRepo;
use App\Repositories\TeacherRepository as TeacherRepo;
use App\Repositories\TeacherRoleRepository as TeacherRoleRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    protected $studentRepo,$streamRepo,$deptRepo,$teacherRepo,$teacherRoleRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentRepo $studentRepo,StreamRepo $streamRepo,DeptRepo $deptRepo,TeacherRepo $teacherRepo,TeacherRoleRepo $teacherRoleRepo)
    {
        $this->middleware('auth:parent');
        $this->studentRepo = $studentRepo;
        $this->streamRepo = $streamRepo;
        $this->deptRepo = $deptRepo;
        $this->teacherRepo = $teacherRepo;
        $this->teacherRoleRepo = $teacherRoleRepo;
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

    public function showStudent($id)
    {
        $student = $this->studentRepo->getId($id);

        return view('parent.show_student',compact('student'));
    }

    public function studentStream($id)
    {
        $stream = $this->streamRepo->getId($id);
        $standardSubjects = $stream->standard_subjects;

        return view('parent.student_stream',compact('stream','standardSubjects'));
    }

    public function schoolTeachers()
    {
        $user = Auth::user();
        $principal = $this->teacherRoleRepo->principal();
        $headTeachers = $principal->teachers()->with('position_teacher')->get();

        $deputy = $this->teacherRoleRepo->deputyPrincipal();
        $deputyHeadTeachers = $deputy->teachers()->with('position_teacher')->get();

        $scienceDept = $this->deptRepo->scienceDept();
        $scienceDeptHead = $this->teacherRoleRepo->scienceDeptHead();
        $scienceDeptHeadTeachers = $scienceDeptHead->teachers()->with('position_teacher')->get();
        $scienceDeptAssHead = $this->teacherRoleRepo->assistScienceDept();
        $scienceDeptAssHeadTeachers = $scienceDeptAssHead->teachers()->with('position_teacher')->get();
        $scienceDeptTeachers = $scienceDept->teachers()->with('position_teacher')->get();

        return view('parent.school_teachers',compact('user','headTeachers','deputyHeadTeachers','scienceDept','scienceDeptHeadTeachers','scienceDeptAssHeadTeachers','scienceDeptTeachers'));
    }

    public function showTeacher($id)
    {
        $teacher = $this->teacherRepo->getId($id);

    	return view('parent.show_teacher',compact('teacher'));
    }
}
