<?php

namespace App\Services;

use App\Repositories\YearRepository;
use App\Http\Requests\YearFormRequest as StoreRequest;
use App\Http\Requests\YearFormRequest as UpdateRequest;

class YearService
{
	protected $yearRepo;

	public function __construct(YearRepository $yearRepo)
	{
		$this->yearRepo = $yearRepo;
	}

	public function all()
	{
		return $this->yearRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->yearRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->yearRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->yearRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->all();

        return $data;
	}

	public function delete($id)
	{
		return $this->yearRepo->delete($id);
	}
}