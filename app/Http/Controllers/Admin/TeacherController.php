<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Stream;
use App\Models\PositionTeacher;
use Illuminate\Support\Facades\Storage;
use App\Models\Teacher;
use App\Models\School;
use App\Models\Subject;
use App\Models\Assignment;
use App\Models\Reward;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class TeacherController extends Controller
{
    use ImageUploadTrait;
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
        $teachers = Teacher::with('streams','school','students','position_teacher')->get();

        return view('admin.teachers.index',['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacherRoles = PositionTeacher::all();

        return view('admin.teachers.create',compact('teacherRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $input['position_teacher_id'] = $request->teacher_role;
        $input['password'] = Hash::make($request->password);
        $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $teacher=Teacher::create($input);

        return redirect()->route('admin.teachers.index')->withSuccess(ucwords($teacher->full_name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        //
        $teacher = Teacher::findOrFail($id);
        $streams = Stream::all();
        $teacherStreams = $teacher->streams;
        $subjects = Subject::all();
        $teacherSubjects = $teacher->subjects;
        $assignments = Assignment::all();
        $teacherAssignments = $teacher->assignments;
        $rewards = Reward::all();
        $teacherRewards = $teacher->rewards;

        return view('admin.teachers.show',compact('teacher','streams','teacherStreams','subjects','teacherSubjects','assignments','teacherAssignments','rewards','teacherRewards'));
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
        $teacher = Teacher::findOrFail($id);
        $teacherRoles = PositionTeacher::all();

        return view('admin.teachers.edit',compact('teacher','teacherRoles'));
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
        $teacher = Teacher::findOrFail($id);
        if($teacher){
            Storage::delete('public/storage/'.$teacher->image);
            $input = $request->only('first_name','middle_name','last_name','title','email','image','id_no','emp_no','dob','designation','postal_address','phone_no','history');
            $input['school_id'] = auth()->user()->school->id;
            $input['position_teacher_id'] = $request->teacher_role;
            $input['image'] = $this->verifyAndUpload($request,'image','public/storage/');
            $teacher->update($input);

            return redirect()->route('admin.teachers.index')->withSuccess(ucwords($teacher->full_name." ".'info updated successfully'));
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
        $teacher = Teacher::findOrFail($id);
        if($teacher){
            Storage::delete('public/storage/'.$teacher->image);
            $teacher->delete();

        return redirect()->route('admin.teachers.index')->withSuccess(ucwords($teacher->full_name." ".'info deleted successfully'));
        }
    }
}
