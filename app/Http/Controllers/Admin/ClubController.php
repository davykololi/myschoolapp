<?php

namespace App\Http\Controllers\Admin;

use App\Services\ClubService;
use App\Services\StudentService;
use App\Services\TeacherService;
use App\Services\StaffService;
use App\Services\MeetingService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    protected $clubService, $studentService, $teacherService, $staffService, $meetingService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClubService $clubService,StudentService $studentService,TeacherService $teacherService,StaffService $staffService,MeetingService $meetingService)
    {
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
        $this->clubService = $clubService;
        $this->studentService = $studentService;
        $this->teacherService = $teacherService;
        $this->staffService = $staffService;
        $this->meetingService = $meetingService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clubs = $this->clubService->all();

        return view('admin.clubs.index',['clubs'=>$clubs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $club = $this->clubService->getId($id);
        $students = $this->studentService->all()->pluck('full_name','id');
        $clubStudents = $club->students;
        $teachers = $this->teacherService->all()->pluck('full_name','id');
        $clubTeachers = $club->teachers;
        $staffs = $this->staffService->all()->pluck('full_name','id');
        $clubStaffs = $club->staffs;
        $meetings = $this->meetingService->all()->pluck('name','id');
        $clubMeetings = $club->meetings;

        return view('admin.clubs.show',compact('club','students','clubStudents','teachers','clubTeachers','staffs','clubStaffs','meetings','clubMeetings'));
    }
}
