<?php

namespace App\Http\Controllers\Admin;

use App\Services\MeetingService;
use App\Services\TeacherService;
use App\Services\StudentService;
use App\Services\SubordinateService;
use App\Services\StreamService;
use App\Services\ClubService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MeetingFormRequest as StoreRequest;
use App\Http\Requests\MeetingFormRequest as UpdateRequest;

class MeetingController extends Controller
{
    protected $meetingService,$teacherService,$studentService,$subordinateService,$streamService,$clubService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MeetingService $meetingService,TeacherService $teacherService,StudentService $studentService,SubordinateService $subordinateService,StreamService $streamService,ClubService $clubService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->meetingService = $meetingService;
        $this->teacherService = $teacherService;
        $this->studentService = $studentService;
        $this->subordinateService = $subordinateService;
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
        $subordinates = $this->subordinateService->all();
        $streams = $this->streamService->all();
        $clubs = $this->clubService->all();
        
        return view('admin.meetings.create',compact('teachers','students','subordinates','streams','clubs'));
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
        $subordinates = $request->subordinates;
        $meeting ->subordinates()->sync($subordinates);
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
        $teachers = $this->teacherService->all();
        $meetingTeachers = $meeting->teachers()->with('user')->get();
        $students = $this->studentService->all();
        $meetingStudents = $meeting->students()->with('user','stream')->get();
        $subordinates = $this->subordinateService->all();
        $meetingSubordinates = $meeting->subordinates()->with('user')->get();
        $streams = $this->streamService->all();
        $meetingStreams = $meeting->streams;
        $clubs = $this->clubService->all();
        $meetingClubs = $meeting->clubs;

        return view('admin.meetings.show',compact('meeting','teachers','meetingTeachers','students','meetingStudents','subordinates','meetingSubordinates','streams','meetingStreams','clubs','meetingClubs'));
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
        $subordinates = $this->subordinateService->all();
        $streams = $this->streamService->all();
        $clubs = $this->clubService->all();
    
        return view('admin.meetings.edit',compact('meeting','teachers','students','subordinates','streams','clubs'));
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
            $subordinates = $request->subordinates;
            $meeting ->subordinates()->sync($subordinates);
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
            $meeting ->subordinates()->detach();
            $meeting ->streams()->detach();
            $meeting ->clubs()->detach();
            $meeting ->departments()->detach();

        return redirect()->route('admin.meetings.index')->withSuccess(ucwords($meeting->name." ".'info deleted successfully'));
        }
    }
}
