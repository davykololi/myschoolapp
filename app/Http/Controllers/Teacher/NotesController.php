<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Auth;
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

class NotesController extends Controller
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
        $notes = Auth::user()->notes()->with('department','school','stream','class')->latest()->get();

        return view('teacher.notes.index',compact('notes'));
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
        $departments = Department::all();
        $subjects = Subject::all();
        $standardSubjects = StandardSubject::all();

        return view('teacher.notes.create',compact('streams','departments','subjects','standardSubjects'));
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
        $input['teacher_id'] = Auth::id();
        $input['subject_id'] = $request->subject;
        $input['standard_subject_id'] = $request->standard_subject;
        $note = Note::create($input);

        return redirect()->route('teacher.notes.index')->withSuccess('The notes uploaded successfully!');
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
        return view('teacher.notes.show',compact('note'));
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
        $departments = Department::all();
        $subjects = Subject::all();
        $standardSubjects = StandardSubject::all();

        return view('teacher.notes.edit',compact('note','streams','departments','subjects','standardSubjects'));
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
            $input['teacher_id'] = Auth::id();
            $input['subject_id'] = $request->subject;
            $input['standard_subject_id'] = $request->standard_subject;
            $note->update($input);

            return redirect()->route('teacher.notes.index')->withSuccess('The notes updated successfully!');
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

            return redirect()->route('teacher.notes.index')->withSuccess('The notes deleted successfully!');
        }
    }
}
