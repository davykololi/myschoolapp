<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\School;
use App\Models\Club;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Staff;
use App\Models\Meeting;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClubController extends Controller
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
        $clubs = Club::with('teachers','students','school')->latest()->get();

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
        $teachers = Teacher::all();
        $students = Student::all();
        $staffs = Staff::all();

        return view('admin.clubs.create',compact('teachers','students','staffs'));
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
        $input['school_id'] = Auth::user()->school->id;
        $club = Club::create($input);
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
        $club = Club::findOrFail($id);
        $students = Student::all();
        $clubStudents = $club->students;
        $teachers = Teacher::all();
        $clubTeachers = $club->teachers;
        $staffs = Staff::all();
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
        $club = Club::findOrFail($id);
        $teachers = Teacher::all();
        $students = Student::all();
        $staffs = Staff::all();

        return view('admin.clubs.edit',compact('club','teachers','students','staffs'));
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
        $club = Club::findOrFail($id);
        $input = $request->only(['name','reg_date']);
        $input['school_id'] = Auth::user()->school->id;
        $club->update($input);
        $teacherId = $request->teacher;
        $club->teachers()->sync($teacherId);
        $studentId = $request->student;
        $club->students()->sync($studentId);
        $staffId = $request->staff;
        $club->staffs()->sync($staffId);

        return redirect()->route('admin.clubs.index')->withSuccess(ucwords($club->name." ".'updated successfully'));
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
        $club = Club::findOrFail($id);
        $club->delete();
        $club->teachers()->detach();
        $club->students()->detach();
        $club->staffs()->detach();

        return redirect()->route('admin.clubs.index')->withSuccess(ucwords($club->name." ".'deleted successfully'));
    }
}
