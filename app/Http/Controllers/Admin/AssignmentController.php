<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\School;
use App\Models\Assignment;
use App\Models\Student;
use App\Models\Stream;
use App\Models\Staff;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FilesUploadTrait;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    use FilesUploadTrait;
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
        $assignments = Assignment::with('school','teachers','departments','subjects','classes','streams')->latest()->get();

        return view('admin.assignments.index',compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $streams = Stream::all();
        $teachers = Teacher::all();
        $students = Student::all();
        $staffs = Staff::all();

        return view('admin.assignments.create',compact('streams','teachers','students','staffs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'file' => 'required|mimes:pdf,xlx,csv|max:2048',
                'name' => 'required',
                'date' => 'required',
                'deadline' => 'required|date',
                ]);

        $input = $request->all();
        $input['school_id'] = Auth::user()->school->id;
        $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
        $assignment = Assignment::create($input);
        $teacherId = $request->teacher;
        $assignment->teachers()->attach($teacherId);
        $streamId = $request->stream;
        $assignment->streams()->attach($streamId);
        $studentId = $request->student;
        $assignment->students()->attach($studentId);
        $staffId = $request->staff;
        $assignment->staffs()->attach($staffId);


        return redirect()->route('admin.assignments.index')->withSuccess('The assignment created successfully');
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
        $assignment = Assignment::findOrFail($id);
        $students = Student::all();
        $assignmentStudents = $assignment->students;

        return view('admin.assignments.show',['assignment'=>$assignment,'students'=>$students,'assignmentStudents'=>$assignmentStudents]);
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
        $assignment = Assignment::findOrFail($id);
        $streams = Stream::all();
        $teachers = Teacher::all();
        $students = Student::all();
        $staffs = Staff::all();

        return view('admin.assignments.edit',compact('assignment','streams','teachers','students','staffs'));
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
        $assignment = Assignment::findOrFail($id);
        if($assignment){
            Storage::delete('public/files/'.$assignment->file);
            $input = $request->only('name','date','deadline');
            $input['school_id'] = Auth::user()->school->id;
            $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
            $assignment->update($input);
            $teacherId = $request->teacher;
            $assignment->teachers()->sync($teacherId);
            $streamId = $request->stream;
            $assignment->standards()->sync($standardId);
            $studentId = $request->student;
            $assignment->students()->sync($studentId);
            $staffId = $request->staff;
            $assignment->staffs()->sync($staffId);

            return redirect()->route('admin.assignments.index')->withSuccess('The assignment updated successfully');
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
        $assignment = Assignment::findOrFail($id);
        if($assignment){
            Storage::delete('public/files/'.$assignment->file);
            $assignment->delete();
            $assignment->teachers()->detach();
            $assignment->streams()->detach();
            $assignment->students()->detach();
            $assignment->staffs()->detach();

            return redirect()->route('admin.assignments.index')->withSuccess('The assignment deleted successfully');
        }
    }
}
