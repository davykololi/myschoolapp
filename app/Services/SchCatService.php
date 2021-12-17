<?php

namespace App\Services;

use App\Repositories\SchCatRepository;
use Illuminate\Support\Str;
use App\Http\Requests\SchCatFormRequest as StoreRequest;
use App\Http\Requests\SchCatFormRequest as UpdateRequest;

class SchCatService
{
	protected $schCatRepo;

	public function __construct(SchCatRepository $schCatRepo)
	{
		$this->schCatRepo = $schCatRepo;
	}

	public function all()
	{
		return $this->schCatRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->schCatRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->schCatRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->schCatRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->all();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->schCatRepo->delete($id);
	}
}