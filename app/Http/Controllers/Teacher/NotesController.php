<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\School;
use App\Models\Department;
use App\Models\Stream;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\StreamSubject;
use App\Services\NotesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NotesFormRequest as StoreRequest;

class NotesController extends Controller
{
    protected $notesService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NotesService $notesService)
    {
        $this->middleware('auth');
        $this->middleware('role:teacher');
        $this->middleware('teacher-banned');
        $this->middleware('checktwofa');
        $this->notesService = $notesService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNotes(StoreRequest $request)
    {
        //
        $note = $this->notesService->create($request);

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
