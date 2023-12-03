<?php

namespace App\Services;

use Auth;
use App\Repositories\StreamRepository;
use Illuminate\Support\Str;
use App\Http\Requests\StreamFormRequest as StoreRequest;
use App\Http\Requests\StreamFormRequest as UpdateRequest;

class StreamService
{
	protected $streamRepository;

	public function __construct(StreamRepository $streamRepository)
	{
		$this->streamRepository = $streamRepository;
	}

	public function all()
	{
		return $this->streamRepository->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->streamRepository->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->streamRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->streamRepository->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['code'] = strtoupper(auth()->user()->school->initials.'/'.Str::random(5).'/'.now()->year);
        $data['class_id'] = $request->class;
        $data['stream_section_id'] = $request->stream_section;
        $data['school_id'] = auth()->user()->school->id;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data = $request->only(['name']);
        $data['school_id'] = auth()->user()->school->id;
        $data['stream_section_id'] = $request->stream_section;
        $data['code'] = strtoupper(auth()->user()->school->initials.'/'.Str::random(5).'/'.now()->year);
        $data['class_id'] = $request->class;

        return $data;
	}

	public function delete($id)
	{
		return $this->streamRepository->delete($id);
	}
}