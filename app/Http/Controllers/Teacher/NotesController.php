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
use App\Models\StreamSubjectTeacher;
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
        $this->middleware('teacher2fa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNotes(Request $request)
    {
        //
        $input = $request->all();
        $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
        $input['school_id'] = Auth::user()->school->id;
        $input['stream_id'] = $request->stream_id;
        $input['teacher_id'] = Auth::id();
        $input['subject_id'] = $request->subject_id;
        $subject = Subject::whereId($input['subject_id'])->first();
        $input['department_id'] = $subject->department->id;
        $note = Note::create($input);

        return redirect()->back()->withSuccess('The notes uploaded successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function deleteNotes(Note $note)
    {
        //
        if($note){
            Storage::delete('public/files/'.$note->file);
            $note->delete();

            return redirect()->back()->withSuccess('The notes deleted successfully!');
        }
    }
}
