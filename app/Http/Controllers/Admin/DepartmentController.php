<?php

namespace App\Http\Controllers\Admin;

use App\Services\TeacherService;
use App\Services\StaffService;
use App\Services\DepartmentService;
use App\Services\MeetingService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $deptService, $teacherService, $staffService, $meetingService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DepartmentService $deptService,TeacherService $teacherService,StaffService $staffService,MeetingService $meetingService)
    {
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
        $this->deptService = $deptService;
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
        $teachers = $this->teacherService->all()->pluck('full_name','id');
        $deptTeachers = $department->teachers;
        $staffs = $this->staffService->all()->pluck('full_name','id');
        $deptStaffs = $department->staffs;
        $meetings = $this->meetingService->all()->pluck('name','id');
        $deptMeetings = $department->meetings;

        return view('admin.departments.show',compact('department','teachers','deptTeachers','staffs','deptStaffs','meetings','deptMeetings'));
    }
}
