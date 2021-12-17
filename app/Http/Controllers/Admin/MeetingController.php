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
        $teachers = $this->teacherService->all();
        $students = $this->studentService->all();
        $staffs = $this->staffService->all();
        $streams = $this->streamService->all();
        $clubs = $this->clubService->all();
        
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
        $teacherId = $request->teacher;
        $meeting->teachers()->attach($teacherId);
        $studentId = $request->student;
        $meeting ->students()->attach($studentId);
        $staffId = $request->staff;
        $meeting ->staffs()->attach($staffId);
        $streamId = $request->stream;
        $meeting ->streams()->attach($streamId);
        $clubId = $request->club;
        $meeting ->clubs()->attach($clubId);

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
        $teachers = $this->teacherService->all();
        $meetingTeachers = $meeting->teachers;
        $students = $this->studentService->all();
        $meetingStudents = $meeting->students;
        $staffs = $this->staffService->all();
        $meetingStaffs = $meeting->staffs;
        $streams = $this->streamService->all();
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
        $teachers = $this->teacherService->all();
        $students = $this->studentService->all();
        $staffs = $this->staffService->all();
        $streams = $this->streamService->all();
        $clubs = $this->clubService->all();
    
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
            $teacherId = $request->teacher;
            $meeting->teachers()->sync($teacherId);
            $studentId = $request->student;
            $meeting ->students()->sync($studentId);
            $staffId = $request->staff;
            $meeting ->staffs()->sync($staffId);
            $streamId = $request->stream;
            $meeting ->streams()->sync($streamId);
            $clubId = $request->club;
            $meeting ->clubs()->sync($clubId);

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
