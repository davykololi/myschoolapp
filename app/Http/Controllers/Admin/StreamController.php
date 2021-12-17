<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Services\StreamService;
use App\Models\Teacher;
use App\Models\Assignment;
use App\Models\Exam;
use App\Models\Meeting;
use App\Models\Reward;
use App\Models\Subject;
use App\Models\MyClass;
use App\Models\StreamSection;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StreamFormRequest as StoreRequest;
use App\Http\Requests\StreamFormRequest as UpdateRequest;

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
        $this->middleware('auth:admin');
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $classes = MyClass::all();
        $streamSections = StreamSection::all();

        return view('admin.streams.create',compact('classes','streamSections'));
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

        return redirect()->route('admin.streams.index')->withSuccess(ucwords($stream->name." ".'stream info created successfully'));
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
        $teachers = Teacher::all();
        $streamTeachers = $stream->teachers;
        $assignments = Assignment::all();
        $streamAssignments = $stream->assignments;
        $exams = Exam::all();
        $streamExams = $stream->exams;
        $meetings = Meeting::all();
        $streamMeetings = $stream->meetings;
        $rewards = Reward::all();
        $streamRewards = $stream->rewards;
        $subjects = Subject::all();
        $streamSubjects = $stream->subjects;

        return view('admin.streams.show',compact('stream','teachers','streamTeachers','assignments','streamAssignments','exams','streamExams','meetings','streamMeetings','rewards','streamRewards','subjects','streamSubjects'));
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

        return view('admin.streams.edit',compact('stream','classes','streamSections'));
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

            return redirect()->route('admin.streams.index')->withSuccess(ucwords($stream->name." ".'stream info updated successfully'));
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

            return redirect()->route('admin.streams.index')->withSuccess(ucwords($stream->name." ".'stream info deleted successfully'));
        }
    }
}
