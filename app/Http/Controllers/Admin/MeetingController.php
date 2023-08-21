<?php

namespace App\Http\Controllers\Admin;

use App\Services\MeetingService;
use App\Services\TeacherService;
use App\Services\StudentService;
use App\Services\StaffService;
use App\Services\StreamService;
use App\Services\ClubService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MeetingFormRequest as StoreRequest;
use App\Http\Requests\MeetingFormRequest as UpdateRequest;

class MeetingController extends Controller
{
    protected $meetingService,$teacherService,$studentService,$staffService,$streamService,$clubService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MeetingService $meetingService,TeacherService $teacherService,StudentService $studentService,StaffService $staffService,StreamService $streamService,ClubService $clubService)
    {
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
        $this->meetingService = $meetingService;
        $this->teacherService = $teacherService;
        $this->studentService = $studentService;
        $this->staffService = $staffService;
        $this->streamService = $streamService;
        $this->clubService = $clubService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $meetings = $this->meetingService->all();

        return view('admin.meetings.index',['meetings'=>$meetings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teachers = $this->teacherService->all()->pluck('full_name','id');
        $students = $this->studentService->all()->pluck('full_name','id');
        $staffs = $this->staffService->all()->pluck('full_name','id');
        $streams = $this->streamService->all()->pluck('name','id');
        $clubs = $this->clubService->all()->pluck('name','id');
        
        return view('admin.meetings.create',compact('teachers','students','staffs','streams','clubs'));
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
        $meeting = $this->meetingService->create($request);
        $teachers = $request->teachers;
        $meeting->teachers()->sync($teachers);
        $students = $request->students;
        $meeting ->students()->sync($students);
        $staffs = $request->staffs;
        $meeting ->staffs()->sync($staffs);
        $streams = $request->streams;
        $meeting ->streams()->sync($streams);
        $clubs = $request->clubs;
        $meeting ->clubs()->sync($clubs);

        return redirect()->route('admin.meetings.index')->withSuccess(ucwords($meeting->name." ".'info created successfully'));
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
        $meeting = $this->meetingService->getId($id);
        $teachers = $this->teacherService->all()->pluck('full_name','id');
        $meetingTeachers = $meeting->teachers;
        $students = $this->studentService->all()->pluck('full_name','id');
        $meetingStudents = $meeting->students;
        $staffs = $this->staffService->all()->pluck('full_name','id');
        $meetingStaffs = $meeting->staffs;
        $streams = $this->streamService->all()->pluck('name','id');
        $meetingStreams = $meeting->streams;

        return view('admin.meetings.show',compact('meeting','teachers','meetingTeachers','students','meetingStudents','staffs','meetingStaffs','streams','meetingStreams'));
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
        $meeting = $this->meetingService->getId($id);
        $teachers = $this->teacherService->all()->pluck('full_name','id');
        $students = $this->studentService->all()->pluck('full_name','id');
        $staffs = $this->staffService->all()->pluck('full_name','id');
        $streams = $this->streamService->all()->pluck('name','id');
        $clubs = $this->clubService->all()->pluck('name','id');
    
        return view('admin.meetings.edit',compact('meeting','teachers','students','staffs','streams','clubs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $meeting = $this->meetingService->getId($id);
        if($meeting){
            $this->meetingService->update($request,$id);
            $teachers = $request->teachers;
            $meeting->teachers()->sync($teachers);
            $students = $request->students;
            $meeting ->students()->sync($students);
            $staffs = $request->staffs;
            $meeting ->staffs()->sync($staffs);
            $streams = $request->streams;
            $meeting ->streams()->sync($streams);
            $clubs = $request->clubs;
            $meeting ->clubs()->sync($clubs);

            return redirect()->route('admin.meetings.index')->withSuccess(ucwords($meeting->name." ".'info updated successfully'));
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
        $meeting = $this->meetingService->getId($id);
        if($meeting){
            $this->meetingService->delete($id);
            $meeting->teachers()->detach();
            $meeting ->students()->detach();
            $meeting ->staffs()->detach();
            $meeting ->streams()->detach();
            $meeting ->clubs()->detach();
            $meeting ->departments()->detach();

        return redirect()->route('admin.meetings.index')->withSuccess(ucwords($meeting->name." ".'info deleted successfully'));
        }
    }
}
