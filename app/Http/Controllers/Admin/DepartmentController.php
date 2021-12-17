<?php

namespace App\Http\Controllers\Admin;

use App\Services\TeacherService;
use App\Models\Staff;
use App\Services\DepartmentService;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DeptFormRequest as StoreRequest;
use App\Http\Requests\DeptFormRequest as UpdateRequest;

class DepartmentController extends Controller
{
    protected $deptService;
    protected $teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DepartmentService $deptService,TeacherService $teacherService)
    {
        $this->middleware('auth:admin');
        $this->deptService = $deptService;
        $this->teacherService = $teacherService;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teachers = $this->teacherService->all();
        $staffs = Staff::all();
        $meetings = Meeting::all();

        return view('admin.departments.create',compact('teachers','staffs','meetings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $department = $this->deptService->create($request);
        if(!$department){
            return redirect()->route('admin.departments.index')->withErrors(ucwords('Oops!, An error occured. Please try again later!'));
        }
        $teacherId = $request->teacher;
        $department->teachers()->attach($teacherId);
        $staffId = $request->staff;
        $department->staffs()->attach($staffId);
        $meetingId = $request->meeting;
        $department->meetings()->attach($meetingId);

        return redirect()->route('admin.departments.index')->withSuccess(ucwords($department->name." ".'created successfully'));
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
        $deptTeachers = $department->teachers;
        $staffs = Staff::all();
        $deptStaffs = $department->staffs;
        $meetings = Meeting::all();
        $deptMeetings = $department->meetings;

        return view('admin.departments.show',compact('department','teachers','deptTeachers','staffs','deptStaffs','meetings','deptMeetings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $department = $this->deptService->getId($id);

        return view('admin.departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        //
        $department = $this->deptService->getId($id);
        if($department){
            $this->deptService->update($request,$id);

            return redirect()->route('admin.departments.index')->withSuccess(ucwords($department->name." ".'details updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $department = $this->deptService->getId($id);
        if($department){
            $this->deptService->delete($id);

            return redirect()->route('admin.departments.index')->withSuccess(ucwords($department->name." ".'deleted successfully'));
        }
    }
}
