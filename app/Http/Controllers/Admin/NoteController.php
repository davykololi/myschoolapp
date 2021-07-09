<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\School;
use App\Models\Department;
use App\Models\Stream;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\StandardSubject;
use Illuminate\Http\Request;
use App\Traits\FilesUploadTrait;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
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
        $notes = Note::with('teacher','department','school','stream')->latest()->get();

        return view('admin.notes.index',compact('notes'));
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
        $departments = Department::all();
        $subjects = Subject::all();
        $standardSubjects = StandardSubject::all();

        return view('admin.notes.create',compact('streams','teachers','departments','subjects','standardSubjects'));
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
        $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
        $input['school_id'] = auth()->user()->school->id;
        $input['department_id'] = $request->department;
        $input['stream_id'] = $request->stream;
        $input['teacher_id'] = $request->teacher;
        $input['subject_id'] = $request->subject;
        $input['standard_subject_id'] = $request->standard_subject;
        Note::create($input);

        return redirect()->route('admin.notes.index')->withSuccess(ucwords('The notes uploaded successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
        return view('admin.notes.show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
        $streams = Stream::all();
        $teachers = Teacher::all();
        $departments = Department::all();
        $subjects = Subject::all();
        $standardSubjects = StandardSubject::all();

        return view('admin.notes.edit',compact('note','streams','teachers','departments','subjects','standardSubjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
        if($note){
            Storage::delete('public/files/'.$note->file);
            $input = $request->all();
            $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
            $input['school_id'] = auth()->user()->school->id;
            $input['department_id'] = $request->department;
            $input['stream_id'] = $request->stream;
            $input['teacher_id'] = $request->teacher;
            $input['subject_id'] = $request->subject;
            $input['standard_subject_id'] = $request->standard_subject;
            $note->update($input);

            return redirect()->route('admin.notes.index')->withSuccess(ucwords('The notes updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
        if($note){
            Storage::delete('public/files/'.$note->file);
            $note->delete();

            return redirect()->route('admin.notes.index')->withSuccess(ucwords('The notes deleted successfully!'));
        }
    }
}
