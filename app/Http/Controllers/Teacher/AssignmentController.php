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
        $this->middleware('teacher2fa');
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
        $streams = Stream::all()->pluck('name','id');
        $students = Student::all()->pluck('full_name','id');
        $staffs = Staff::all()->pluck('full_name','id');

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
        $teacher = Auth::id();
        $assignment->teachers()->sync($teacher);
        $streams = $request->streams;
        $assignment->streams()->sync($streams);
        $students = $request->students;
        $assignment->students()->sync($students);
        $staffs = $request->staffs;
        $assignment->staffs()->sync($staffs);

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
        $streams = Stream::all()->pluck('name','id');
        $students = Student::all()->pluck('full_name','id');
        $staffs = Staff::all()->pluck('full_name','id');

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
            $streams = $request->streams;
        	$assignment->streams()->sync($streams);
            $students = $request->students;
            $assignment->students()->sync($students);
            $staffs = $request->staffs;
            $assignment->staffs()->sync($staffs);

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
