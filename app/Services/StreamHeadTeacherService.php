<?php

namespace App\Services;

use Auth;
use App\Repositories\StreamHeadTeacherRepository;
use Illuminate\Support\Str;
use App\Http\Requests\StreamHeadTeacherFormRequest;

class StreamHeadTeacherService
{
	protected $streamHeadTeacherRepository;

	public function __construct(StreamHeadTeacherRepository $streamHeadTeacherRepository)
	{
		$this->streamHeadTeacherRepository = $streamHeadTeacherRepository;
	}

	public function all()
	{
		return $this->streamHeadTeacherRepository->all();
	}

	public function paginated()
	{
		return $this->streamHeadTeacherRepository->paginated();
	}

	public function create(StreamHeadTeacherFormRequest $request)
	{
		$data = $this->data($request);

		return $this->streamHeadTeacherRepository->create($data);
	}

	public function update(StreamHeadTeacherFormRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->streamHeadTeacherRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->streamHeadTeacherRepository->getId($id);
	}

	public function data(StreamHeadTeacherFormRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = Auth::user()->school->id;
        $data['stream_id'] = $request->stream_id;

        return $data;
	}

	public function delete($id)
	{
		return $this->streamHeadTeacherRepository->delete($id);
	}
}