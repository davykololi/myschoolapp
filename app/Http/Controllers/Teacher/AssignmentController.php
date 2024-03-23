<?php

namespace App\Http\Controllers\Teacher;

use Auth;
use App\Models\School;
use App\Models\Assignment;
use App\Models\Stream;
use App\Models\Student;
use App\Models\Subordinate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\FilesUploadTrait;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AssignFormRequest as StoreRequest;
use App\Http\Requests\AssignFormRequest as UpdateRequest;

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
        $this->middleware('auth');
        $this->middleware('role:teacher');
        $this->middleware('teacher-banned');
        $this->middleware('checktwofa');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assignments = Auth::user()->teacher->assignments()->with('school','teachers','departments','subjects','streams')->latest()->get();

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
        $students = Student::with('user')->get();
        $subordinates = Subordinate::with('user')->get();

        return view('teacher.assignments.create',compact('streams','students','subordinates'));
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
        $input = $request->all();
        $input['school_id'] = auth()->user()->school->id;
        $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
        $assignment = Assignment::create($input);
        $teacherId = Auth::user()->teacher->id;
        $assignment->teachers()->sync($teacherId);
        $streams = $request->streams;
        $assignment->streams()->sync($streams);
        $students = $request->students;
        $assignment->students()->sync($students);
        $subordinates = $request->subordinates;
        $assignment->subordinates()->sync($subordinates);

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
        $students = Student::with('user')->get();
        $subordinates = Subordinate::with('user')->get();

        return view('teacher.assignments.edit',compact('assignment','streams','students','subordinates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Assignment $assignment)
    {
        //
        if($assignment){
            Storage::delete('public/files/'.$assignment->file);
            $input = $request->all();
            $input['school_id'] = auth()->user()->school->id;
            $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
            $assignment->update($input);
            $teacherId = Auth::user()->teacher->id;
            $assignment->teachers()->sync($teacherId);
            $streams = $request->streams;
        	$assignment->streams()->sync($streams);
            $students = $request->students;
            $assignment->students()->sync($students);
            $subordinates = $request->subordinates;
            $assignment->subordinates()->sync($subordinates);

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
            $assignment->teachers()->detach();
            $assignment->streams()->detach();
            $assignment->students()->detach();
            $assignment->subordinates()->detach();

            return redirect()->route('teacher.assignments.index')->withSuccess('The assignment deleted successfully');
        }
    }
}
