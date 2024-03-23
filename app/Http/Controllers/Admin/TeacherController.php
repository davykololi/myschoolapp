<?php

namespace App\Http\Controllers\Admin;

use App\Services\TeacherService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeacherService $teacherService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
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
        $teachers = $this->teacherService->all();

        return view('admin.teachers.index',['teachers' => $teachers]);
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
        $teacher = $this->teacherService->getId($id);
        $streams = Stream::all()->pluck('name','id');
        $teacherStreams = $teacher->streams;
        $subjects = Subject::all()->pluck('name','id');
        $teacherSubjects = $teacher->subjects;
        $assignments = Assignment::all()->pluck('name','id');
        $teacherAssignments = $teacher->assignments;
        $rewards = Reward::all()->pluck('name','id');
        $teacherRewards = $teacher->rewards;

        return view('admin.teachers.show',compact('teacher','streams','teacherStreams','subjects','teacherSubjects','assignments','teacherAssignments','rewards','teacherRewards'));
    }
}
