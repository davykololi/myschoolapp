<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\NotesService;
use App\Services\StreamService;
use App\Services\TeacherService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NotesFormRequest as StoreRequest;
use App\Http\Requests\NotesFormRequest as UpdateRequest;

class NoteController extends Controller
{
    protected $notesService,$streamService,$teacherService,$subjectService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NotesService $notesService,StreamService $streamService,TeacherService $teacherService,SubjectService $subjectService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->notesService = $notesService;
        $this->streamService = $streamService;
        $this->teacherService = $teacherService;
        $this->subjectService = $subjectService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notes = $this->notesService->all();

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
        $streams = $this->streamService->all();
        $subjects = $this->subjectService->all();
        $teachers = $this->teacherService->all();

        return view('admin.notes.create',compact('streams','subjects','teachers'));
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
        $note = $this->notesService->create($request);

        return redirect()->route('admin.notes.index')->withSuccess(ucwords('The notes uploaded successfully!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $note = $this->notesService->getId($id);

        return view('admin.notes.show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $note = $this->notesService->getId($id);
        $streams = $this->streamService->all();
        $subjects = $this->subjectService->all();
        $teachers = $this->teacherService->all();

        return view('admin.notes.edit',compact('note','streams','subjects','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $note = $this->notesService->getId($id);
        if($note){
            Storage::delete('public/files/'.$note->file);
            $this->notesService->update($request,$id);

            return redirect()->route('admin.notes.index')->withSuccess(ucwords('The notes updated successfully!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $note = $this->notesService->getId($id);
        if($note){
            Storage::delete('public/files/'.$note->file);
            $this->notesService->delete($id);

            return redirect()->route('admin.notes.index')->withSuccess(ucwords('The notes deleted successfully!'));
        }
    }
}
