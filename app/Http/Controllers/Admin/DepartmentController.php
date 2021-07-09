<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Teacher;
use App\Models\Staff;
use App\Models\Department;
use App\Models\Meeting;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $departments = Department::with('teachers','school',)->latest()->get();

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
        $teachers = Teacher::all();
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
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['code'] = strtoupper(Str::random(15));
        $input['school_id'] = auth()->user()->school->id;
        $department = Department::create($input);
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
        $department = Department::findOrFail($id);
        $teachers = Teacher::all();
        $deptTeachers = $department->teachers;
        $staffs = Staff::all();
        $deptStaffs = $department->staffs;
        $meetings = Meeting::all();
        $deptMeetings = $department->meetings;

        return view('admin.departments.show',['department'=>$department,'teachers'=>$teachers,'deptTeachers'=>$deptTeachers,'staffs'=>$staffs,'deptStaffs'=>$deptStaffs,'meetings'=>$meetings,'deptMeetings'=>$deptMeetings]);
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
        $department = Department::findOrFail($id);

        return view('admin.departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $department = Department::findOrFail($id);
        $input = $request->only('name','phone_no','head_name','asshead_name','motto','vision');
        $input['school_id'] = auth()->user()->school->id;
        $department->update($input);

        return redirect()->route('admin.departments.index')->withSuccess(ucwords($department->name." ".'details updated successfully'));
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
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('admin.departments.index')->withSuccess(ucwords($department->name." ".'deleted successfully'));
    }
}
