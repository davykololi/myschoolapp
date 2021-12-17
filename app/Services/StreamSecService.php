<?php

namespace App\Services;

use App\Repositories\StreamSecRepository as StrSecRepo;
use App\Http\Requests\StreamSecFormRequest as StoreRequest;
use App\Http\Requests\StreamSecFormRequest as UpdateRequest;

class StreamSecService
{
	protected $strSecRepo;

	public function __construct(StrSecRepo $strSecRepo)
	{
		$this->strSecRepo = $strSecRepo;
	}

	public function all()
	{
		return $this->strSecRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->strSecRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->strSecRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->strSecRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = $request->school;

        return $data;
	}

	public function delete($id)
	{
		return $this->strSecRepo->delete($id);
	}
}