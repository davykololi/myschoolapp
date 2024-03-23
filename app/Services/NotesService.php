<?php

namespace App\Services;

use Auth;
use App\Repositories\NotesRepository as NotesRepo;
use App\Traits\FilesUploadTrait;
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

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->notesRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->notesRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->notesRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['file'] = $this->verifyAndUpload($request,'file','public/files/');
        $data['school_id'] = auth()->user()->school->id;
        $data['stream_id'] = $request->stream;
        $data['teacher_id'] = $request->teacher;
        $data['subject_id'] = $request->subject;

        return $data;
	}

	public function delete($id)
	{
		return $this->notesRepo->delete($id);
	}
}