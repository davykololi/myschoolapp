<?php

namespace App\Http\Controllers\Admin;

use App\Services\TeacherService;
use App\Services\SubordinateService;
use App\Services\DepartmentService;
use App\Services\MeetingService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $deptService, $teacherService, $subordinateService, $meetingService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DepartmentService $deptService,TeacherService $teacherService,SubordinateService $subordinateService,MeetingService $meetingService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->deptService = $deptService;
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
        $departments = $this->deptService->all();

        return view('admin.departments.index',['departments'=>$departments]);
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
        $department = $this->deptService->getId($id);
        $teachers = $this->teacherService->all();
        $deptTeachers = $department->teachers()->with('user')->get();
        $subordinates = $this->subordinateService->all();
        $deptSubordinates = $department->subordinates()->with('user')->get();
        $meetings = $this->meetingService->all();
        $deptMeetings = $department->meetings;

        return view('admin.departments.show',compact('department','teachers','deptTeachers','subordinates','deptSubordinates','meetings','deptMeetings'));
    }
}
