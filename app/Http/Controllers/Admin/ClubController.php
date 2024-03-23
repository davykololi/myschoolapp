<?php

namespace App\Http\Controllers\Admin;

use App\Services\ClubService;
use App\Services\StudentService;
use App\Services\TeacherService;
use App\Services\SubordinateService;
use App\Services\MeetingService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    protected $clubService, $studentService, $teacherService, $subordinateService, $meetingService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClubService $clubService,StudentService $studentService,TeacherService $teacherService,SubordinateService $subordinateService,MeetingService $meetingService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->clubService = $clubService;
        $this->studentService = $studentService;
        $this->teacherService = $teacherService;
        $this->subordinateService = $subordinateService;
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
        $students = $this->studentService->all();
        $clubStudents = $club->students()->with('clubs','stream','user')->get();
        $teachers = $this->teacherService->all();
        $clubTeachers = $club->teachers()->with('clubs','user')->get();
        $subordinates = $this->subordinateService->all();
        $clubSubordinates = $club->subordinates()->with('clubs','user')->get();
        $meetings = $this->meetingService->all();
        $clubMeetings = $club->meetings()->with('clubs')->get();

        return view('admin.clubs.show',compact('club','students','clubStudents','teachers','clubTeachers','subordinates','clubSubordinates','meetings','clubMeetings'));
    }
}
