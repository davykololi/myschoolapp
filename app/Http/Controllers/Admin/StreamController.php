<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Models\Assignment;
use App\Models\Exam;
use App\Models\Meeting;
use App\Models\Reward;
use App\Models\Subject;
use App\Services\StreamService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    protected $streamService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamService $streamService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->streamService = $streamService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $streams = $this->streamService->all();

        return view('admin.streams.index',compact('streams'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        //
        $stream = $this->streamService->getId($id);
        $teachers = Teacher::all()->pluck('full_name','id');
        $streamTeachers = $stream->teachers;
        $assignments = Assignment::all()->pluck('name','id');
        $streamAssignments = $stream->assignments;
        $exams = Exam::all()->pluck('name','id');
        $streamExams = $stream->exams;
        $meetings = Meeting::all()->pluck('name','id');
        $streamMeetings = $stream->meetings;
        $rewards = Reward::all()->pluck('name','id');
        $streamRewards = $stream->rewards;
        $subjects = Subject::all()->pluck('name','id');
        $streamSubjects = $stream->subjects;
        $streamStudents = $stream->students->count();
        $females = $stream->females();
        $males = $stream->males();

        return view('admin.streams.show',compact('stream','teachers','streamTeachers','assignments','streamAssignments','exams','streamExams','meetings','streamMeetings','rewards','streamRewards','subjects','streamSubjects','streamStudents','females','males'));
    }
}
