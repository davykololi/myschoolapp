<?php

namespace App\Http\Controllers\Teacher;

use Auth;
use App\Models\School;
use App\Models\Assignment;
use App\Models\Stream;
use App\Models\Student;
use App\Models\Staff;
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
        $this->middleware('auth:teacher');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assignments = Auth::user()->assignments()->with('school','teachers','departments','subjects','streams')->latest()->get();

        return view('teacher.assignments.index',compact('assignments'));
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
        $students = Student::all();
        $staffs = Staff::all();

        return view('teacher.assignments.create',compact('streams','students','staffs'));
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
        $request->validate([
                'file' => 'required|mimes:pdf,xlx,csv|max:2048',
                'name' => 'required',
                'date_given' => 'required',
                'deadline' => 'required|date',
                ]);

        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
        $assignment = Assignment::create($input);
        $teacherId = Auth::id();
        $assignment->teachers()->attach($teacherId);
        $streamId = $request->stream;
        $assignment->streams()->attach($streamId);
        $studentId = $request->student;
        $assignment->students()->attach($studentId);
        $staffId = $request->staff;
        $assignment->staffs()->attach($staffId);

        return redirect()->route('teacher.assignments.index')->withSuccess('The assignment created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //

        return view('teacher.assignments.show',['assignment'=>$assignment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
        $streams = Stream::all();
        $students = Student::all();
        $staffs = Staff::all();

        return view('teacher.assignments.edit',compact('assignment','streams','students','staffs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
        $request->validate([
                'file' => 'required|mimes:pdf,xlx,csv|max:2048',
                'name' => 'required',
                'date_given' => 'required',
                'deadline' => 'required|date',
                ]);
        if($assignment){
            Storage::delete('public/files/'.$assignment->file);
            $input = $request->all();
            $input['school_id'] = auth()->user()->school->id;
            $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
            $assignment->update($input);
            $teacherId = Auth::id();
            $assignment->teachers()->sync($teacherId);
            $streamId = $request->stream;
        	$assignment->streams()->sync($streamId);
            $studentId = $request->student;
            $assignment->students()->sync($studentId);
            $staffId = $request->staff;
            $assignment->staffs()->sync($staffId);

            return redirect()->route('teacher.assignments.index')->withSuccess('The assignment updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
        if($assignment){
            Storage::delete('public/files/'.$assignment->file);
            $assignment->delete();

            return redirect()->route('teacher.assignments.index')->withSuccess('The assignment deleted successfully');
        }
    }
}
