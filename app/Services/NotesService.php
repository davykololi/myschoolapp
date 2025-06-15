<?php

namespace App\Services;

use Auth;
use App\Models\Teacher;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\StreamSubject;
use App\Repositories\NotesRepository as NotesRepo;
use App\Traits\FilesUploadTrait;
use Illuminate\Http\Request;
use App\Http\Requests\NotesFormRequest as StoreRequest;
use App\Http\Requests\NotesFormRequest as UpdateRequest;

class NotesService
{
	use FilesUploadTrait;
	protected $notesRepo;

	public function __construct(NotesRepo $notesRepo)
	{
		$this->notesRepo = $notesRepo;
	}

	public function all()
	{
		return $this->notesRepo->all();
	}

	public function paginated()
	{
		return $this->notesRepo->paginated();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);
		// Show error if not data
		if(!$data){
			return back()->withErrors("Confirm if this teacher is allocated to the provided stream and also allocated the provided subject before you proceed!");
		}

		return $this->notesRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);
		// Show error if not data
		if(!$data){
			return back()->withErrors("Confirm if this teacher is allocated to the provided stream and also allocated the provided subject before you proceed!");
		}

		return $this->notesRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->notesRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$user = Auth::user();
		if($user->hasRole("teacher")){
			$streamId = $request->stream_id;
        	$streamSubject = StreamSubject::where(['stream_id'=>$streamId,'teacher_id'=>$user->teacher->id])->first();
			$data = $request->validated();
        	$data['file'] = $this->verifyAndUpload($request,'file','public/files/');
        	$data['school_id'] = auth()->user()->school->id;
        	$data['class_id'] = $streamSubject->stream->class_id;
        	$data['stream_id'] = $streamSubject->stream_id;
        	$data['teacher_id'] = $streamSubject->teacher_id;
        	$data['subject_id'] = $streamSubject->subject_id;
        	$data['stream_subject_id'] = $streamSubject->id;

        	return $data;
		}

		if(Auth::user()->hasRole("admin")){
			$streamId = $request->stream_id;
			$teacherId = $request->teacher_id;
			$subjectId = $request->subject_id;
			$streamSubject = StreamSubject::where(['stream_id'=>$streamId,'teacher_id'=>$teacherId,'subject_id'=>$subjectId])->first();

        	if(!is_null($streamSubject)){
        		$data = $request->validated();
        		$data['file'] = $this->verifyAndUpload($request,'file','public/files/');
        		$data['school_id'] = auth()->user()->school->id;
        		$data['class_id'] = $streamSubject->stream->class_id;
        		$data['stream_id'] = $streamSubject->stream_id;
        		$data['teacher_id'] = $streamSubject->teacher_id;
        		$data['subject_id'] = $streamSubject->subject_id;
        		$data['stream_subject_id'] = $streamSubject->id;

        		return $data;
        	}
		}
	}

	public function delete($id)
	{
		return $this->notesRepo->delete($id);
	}
}