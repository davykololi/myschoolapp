<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\ClubService;
use App\Services\StudentService;
use App\Services\TeacherService;
use App\Services\SubordinateService;
use App\Services\MeetingService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClubFormRequest as StoreRequest;
use App\Http\Requests\ClubFormRequest as UpdateRequest;

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
        $this->middleware('role:superadmin');
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
        $teachers = $this->teacherService->all();
        $students = $this->studentService->all();
        $subordinates = $this->subordinateService->all();

        return view('superadmin.clubs.create',compact('teachers','students','subordinates'));
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
        $subordinates = $request->subordinates;
        $club->subordinates()->sync($subordinates);

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
        $students = $this->studentService->all();
        $clubStudents = $club->students()->with('stream','user')->get();
        $teachers = $this->teacherService->all();
        $clubTeachers = $club->teachers()->with('user')->get();
        $subordinates = $this->subordinateService->all();
        $clubSubordinates = $club->subordinates()->with('user')->get();
        $meetings = $this->meetingService->all();
        $clubMeetings = $club->meetings;

        return view('superadmin.clubs.show',compact('club','students','clubStudents','teachers','clubTeachers','subordinates','clubSubordinates','meetings','clubMeetings'));
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
        $students = $this->studentService->all();
        $subordinates = $this->subordinateService->all();

        return view('superadmin.clubs.edit',compact('club','teachers','students','subordinates'));
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
            $subordinates = $request->subordinates;
            $club->subordinates()->sync($subordinates);

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
            $club->subordinates()->detach();

            return redirect()->route('superadmin.clubs.index')->withSuccess(ucwords($club->name." ".'deleted successfully'));
        }
    }
}
