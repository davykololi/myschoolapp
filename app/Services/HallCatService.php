<?php

namespace App\Services;

use App\Repositories\HallCatRepository as HallCatRepo;
use Illuminate\Support\Str;
use App\Http\Requests\HallCatFormRequest as StoreRequest;
use App\Http\Requests\HallCatFormRequest as UpdateRequest;

class HallCatService
{
	protected $hallCatRepo;

	public function __construct(HallCatRepo $hallCatRepo)
	{
		$this->hallCatRepo = $hallCatRepo;
	}

	public function all()
	{
		return $this->hallCatRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->hallCatRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->hallCatRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->hallCatRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->hallCatRepo->delete($id);
	}
}