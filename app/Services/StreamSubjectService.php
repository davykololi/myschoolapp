<?php

namespace App\Services;

use Auth;
use App\Repositories\StreamSubjectRepository as StreamSubjectRepo;
use Illuminate\Support\Str;
use App\Http\Requests\StreamSubjectFormRequest as StoreRequest;
use App\Http\Requests\StreamSubjectFormRequest as UpdateRequest;

class StreamSubjectService
{
	protected $streamSubjectRepo;

	public function __construct(StreamSubjectRepo $streamSubjectRepo)
	{
		$this->streamSubjectRepo = $streamSubjectRepo;
	}

	public function all()
	{
		return $this->streamSubjectRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->streamSubjectRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->streamSubjectRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->streamSubjectRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['subject_id'] = $request->subject;
        $data['school_id'] = auth()->user()->school->id;
        $data['stream_id'] = $request->stream;
        $data['teacher_id'] = $request->teacher;

        return $data;
	}

	public function delete($id)
	{
		return $this->streamSubjectRepo->delete($id);
	}
}