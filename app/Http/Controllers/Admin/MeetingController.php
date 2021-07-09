<?php

namespace App\Http\Controllers\Admin;

use App\Models\Meeting;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Stream;
use App\Models\Club;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeetingController extends Controller
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
        $meetings = Meeting::with('teachers','students','schools','streams','clubs')->latest()->get();

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
        $teachers = Teacher::all();
        $students = Student::all();
        $staffs = Staff::all();
        $streams = Stream::all();
        $clubs = Club::all();
        
        return view('admin.meetings.create',compact('teachers','students','staffs','streams','clubs'));
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
        $input['code'] = strtoupper(Str::random(15));
        $input['school_id'] = auth()->user()->school->id;
        $meeting = Meeting::create($input);
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
        $meeting = Meeting::findOrFail($id);
        $teachers = Teacher::all();
        $meetingTeachers = $meeting->teachers;
        $students = Student::all();
        $meetingStudents = $meeting->students;
        $staffs = Staff::all();
        $meetingStaffs = $meeting->staffs;
        $streams = Stream::all();
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
        $meeting = Meeting::findOrFail($id);
        $teachers = Teacher::all();
        $students = Student::all();
        $staffs = Staff::all();
        $streams = Stream::all();
        $clubs = Club::all();
    
        return view('admin.meetings.edit',compact('meeting','teachers','students','staffs','streams','clubs'));
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
        $meeting = Meeting::findOrFail($id);
        $input = $request->only(['name','agenda','date','venue']);
        $input['school_id'] = auth()->user()->school->id;
        $meeting->update($input);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $meeting = Meeting::findOrFail($id);
        $meeting->delete();
        $meeting->teachers()->detach();
        $meeting ->students()->detach();
        $meeting ->staffs()->detach();
        $meeting ->streams()->detach();
        $meeting ->clubs()->detach();

        return redirect()->route('admin.meetings.index')->withSuccess(ucwords($meeting->name." ".'info deleted successfully'));
    }
}
