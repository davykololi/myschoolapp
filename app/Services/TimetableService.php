<?php

namespace App\Services;

use Auth;
use App\Repositories\TimetableRepository as TimetableRepo;
use App\Traits\FilesUploadTrait;
use App\Http\Requests\TimetableFormRequest as StoreRequest;
use App\Http\Requests\TimetableFormRequest as UpdateRequest;

class TimetableService
{
	use FilesUploadTrait;
	protected $timetableRepo;

	public function __construct(TimetableRepo $timetableRepo)
	{
		$this->timetableRepo = $timetableRepo;
	}

	public function all()
	{
		return $this->timetableRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->timetableRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->timetableRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->timetableRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['file'] = $this->verifyAndUpload($request,'file','public/files/');
        $data['school_id'] = auth()->user()->school->id;
        $data['stream_id'] = $request->stream;
        $data['class_id'] = $request->class;
        $data['teacher_id'] = $request->teacher;
        $data['exam_id'] = $request->exam;

        return $data;
	}

	public function delete($id)
	{
		return $this->timetableRepo->delete($id);
	}
}