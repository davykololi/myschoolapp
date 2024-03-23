<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\User;
use App\Models\School;
use App\Models\MyClass;
use App\Models\StreamSubject;
use App\Models\StreamSection;
use App\Services\StreamService;
use App\Services\TeacherService;
use App\Services\AssignmentService;
use App\Services\ExamService;
use App\Services\MeetingService;
use App\Services\RewardService;
use App\Services\SubjectService;
use App\Services\ClassService;
use App\Services\StreamSecService;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StreamFormRequest as StoreRequest;
use App\Http\Requests\StreamFormRequest as UpdateRequest;

class StreamController extends Controller
{
    protected $streamService, $teacherService, $classService, $streamSecService, $assignmentService, $examService, $meetingService, $rewardService, $subjectService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamService $streamService, TeacherService $teacherService, ClassService $classService, StreamSecService $streamSecService, AssignmentService $assignmentService, ExamService $examService, MeetingService $meetingService, RewardService $rewardService, SubjectService $subjectService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->streamService = $streamService;
        $this->teacherService = $teacherService;
        $this->classService = $classService;
        $this->streamSecService = $streamSecService;
        $this->assignmentService = $assignmentService;
        $this->examService = $examService;
        $this->meetingService = $meetingService;
        $this->rewardService = $rewardService;
        $this->subjectService = $subjectService;
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

        return view('superadmin.streams.index',compact('streams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $classes = $this->classService->all();
        $streamSections = $this->streamSecService->all();

        return view('superadmin.streams.create',compact('classes','streamSections'));
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
        $stream = $this->streamService->create($request);

        return redirect()->route('superadmin.streams.index')->withSuccess(ucwords($stream->name." ".'stream info created successfully'));
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
        $stream = $this->streamService->getId($id);
        $teachers = $this->teacherService->all();
        $streamTeachers = $stream->teachers()->with('user')->get();
        $assignments = $this->assignmentService->all()->pluck('name','id');
        $streamAssignments = $stream->assignments;
        $exams = $this->examService->all()->pluck('name','id');
        $streamExams = $stream->exams;
        $meetings = $this->meetingService->all()->pluck('name','id');
        $streamMeetings = $stream->meetings;
        $rewards = $this->rewardService->all()->pluck('name','id');
        $streamRewards = $stream->rewards;
        $subjects = $this->subjectService->all();
        $streamSubjects = $stream->subjects;
        $alocatedStreamSubjects = $stream->stream_subjects()->where('stream_id',$stream->id)->with('teacher.user','stream','school','subject')->get();
        $streamStudents = $stream->students()->with('user')->get();
        $streamStudentsNumber = $stream->students->count();
        $females = $stream->females();
        $males = $stream->males();

        return view('superadmin.streams.show',compact('stream','teachers','streamTeachers','assignments','streamAssignments','exams','streamExams','meetings','streamMeetings','rewards','streamRewards','subjects','streamSubjects','streamStudents','streamStudentsNumber','streamSubjects','alocatedStreamSubjects','females','males'));
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
        $stream = $this->streamService->getId($id);
        $classes = MyClass::all();
        $streamSections = StreamSection::all();

        return view('superadmin.streams.edit',compact('stream','classes','streamSections'));
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
        $stream = $this->streamService->getId($id);
        if($stream){
            $this->streamService->update($request,$id);

            return redirect()->route('superadmin.streams.index')->withSuccess(ucwords($stream->name." ".'stream info updated successfully'));
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
        $stream = $this->streamService->getId($id);
        if($stream){
            $this->streamService->delete($id);

            return redirect()->route('superadmin.streams.index')->withSuccess(ucwords($stream->name." ".'stream info deleted successfully'));
        }
    }
}
