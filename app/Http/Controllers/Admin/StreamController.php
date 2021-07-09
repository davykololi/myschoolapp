<?php

namespace App\Http\Controllers\Admin;

use App\Models\School;
use App\Models\Stream;
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

class StreamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $streams = Stream::with('teachers','students','school','class')->get();

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
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['code'] = strtoupper(auth()->user()->school->initials.'/'.Str::random(5).'/'.now()->year);
        $input['class_id'] = $request->class;
        $input['stream_section_id'] = $request->stream_section;
        $input['school_id'] = auth()->user()->school->id;
        $stream = Stream::create($input);

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
        $stream = Stream::findOrFail($id);
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
        $stream = Stream::findOrFail($id);
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
    public function update(Request $request, $id)
    {
        //
        $stream = Stream::findOrFail($id);
        $input = $request->only(['name']);
        $input['school_id'] = auth()->user()->school->id;
        $input['stream_section_id'] = $request->stream_section;
        $input['code'] = strtoupper(auth()->user()->school->initials.'/'.Str::random(5).'/'.now()->year);
        $input['class_id'] = $request->class;
        $stream->update($input);

        return redirect()->route('admin.streams.index')->withSuccess(ucwords($stream->name." ".'stream info updated successfully'));
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
        $stream = Stream::findOrFail($id);
        $stream->delete();

        return redirect()->route('admin.streams.index')->withSuccess(ucwords($stream->name." ".'stream info deleted successfully'));
    }
}
