<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\ClubService;
use App\Services\StudentService;
use App\Services\TeacherService;
use App\Services\StaffService;
use App\Services\MeetingService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClubFormRequest as StoreRequest;
use App\Http\Requests\ClubFormRequest as UpdateRequest;

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
        $this->middleware('auth:superadmin');
        $this->middleware('superadmin2fa');
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

        return view('superadmin.clubs.index',['clubs'=>$clubs]);
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

        return view('superadmin.clubs.create',compact('teachers','students','staffs'));
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
        $club = $this->clubService->create($request);
        $teachers = $request->teachers;
        $club->teachers()->sync($teachers);
        $students = $request->students;
        $club->students()->sync($students);
        $staffs = $request->staffs;
        $club->staffs()->sync($staffs);

        return redirect()->route('superadmin.clubs.index')->withSuccess(ucwords($club->name." ".'created successfully'));
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

        return view('superadmin.clubs.show',compact('club','students','clubStudents','teachers','clubTeachers','staffs','clubStaffs','meetings','clubMeetings'));
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
        $club = $this->clubService->getId($id);
        $teachers = $this->teacherService->all()->pluck('full_name','id');
        $students = $this->studentService->all()->pluck('full_name','id');
        $staffs = $this->staffService->all()->pluck('full_name','id');

        return view('superadmin.clubs.edit',compact('club','teachers','students','staffs'));
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
        $club = $this->clubService->getId($id);
        if($club){
            $this->clubService->update($request,$id);
            $teachers = $request->teachers;
            $club->teachers()->sync($teachers);
            $students = $request->students;
            $club->students()->sync($students);
            $staffs = $request->staffs;
            $club->staffs()->sync($staffs);

            return redirect()->route('superadmin.clubs.index')->withSuccess(ucwords($club->name." ".'updated successfully'));
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
        $club = $this->clubService->getId($id);
        if($club){
            $this->clubService->delete($id);
            $club->teachers()->detach();
            $club->students()->detach();
            $club->staffs()->detach();

            return redirect()->route('superadmin.clubs.index')->withSuccess(ucwords($club->name." ".'deleted successfully'));
        }
    }
}
