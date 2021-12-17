<?php

namespace App\Http\Controllers\Admin;

use App\Services\ClubService;
use App\Services\StudentService;
use App\Services\TeacherService;
use App\Services\StaffService;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClubFormRequest as StoreRequest;
use App\Http\Requests\ClubFormRequest as UpdateRequest;

class ClubController extends Controller
{
    protected $clubService,$studentService,$teacherService,$staffService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClubService $clubService,StudentService $studentService,TeacherService $teacherService,StaffService $staffService)
    {
        $this->middleware('auth:admin');
        $this->clubService = $clubService;
        $this->studentService = $studentService;
        $this->teacherService = $teacherService;
        $this->staffService = $staffService;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teachers = $this->teacherService->all();
        $students = $this->teacherService->all();
        $staffs = $this->staffService->all();

        return view('admin.clubs.create',compact('teachers','students','staffs'));
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
        $teacherId = $request->teacher;
        $club->teachers()->attach($teacherId);
        $studentId = $request->student;
        $club->students()->attach($studentId);
        $staffId = $request->staff;
        $club->staffs()->attach($staffId);

        return redirect()->route('admin.clubs.index')->withSuccess(ucwords($club->name." ".'created successfully'));
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
        $clubStudents = $club->students;
        $teachers = $this->teacherService->all();
        $clubTeachers = $club->teachers;
        $staffs = $this->staffService->all();
        $clubStaffs = $club->staffs;
        $meetings = Meeting::all();
        $clubMeetings = $club->meetings;

        return view('admin.clubs.show',compact('club','students','clubStudents','teachers','clubTeachers','staffs','clubStaffs','meetings','clubMeetings'));
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
        $teachers = $this->teacherService->all();
        $students = $this->teacherService->all();
        $staffs = $this->staffService->all();

        return view('admin.clubs.edit',compact('club','teachers','students','staffs'));
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

            $teacherId = $request->teacher;
            $club->teachers()->sync($teacherId);
            $studentId = $request->student;
            $club->students()->sync($studentId);
            $staffId = $request->staff;
            $club->staffs()->sync($staffId);

            return redirect()->route('admin.clubs.index')->withSuccess(ucwords($club->name." ".'updated successfully'));
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

            return redirect()->route('admin.clubs.index')->withSuccess(ucwords($club->name." ".'deleted successfully'));
        }
    }
}
