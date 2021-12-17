<?php

namespace App\Services;

use App\Repositories\FarmCatRepository as FarmCatRepo;
use Illuminate\Support\Str;
use App\Http\Requests\FarmCatFormRequest as StoreRequest;
use App\Http\Requests\FarmCatFormRequest as UpdateRequest;

class FarmCatService
{
	protected $farmCatRepo;

	public function __construct(FarmCatRepo $farmCatRepo)
	{
		$this->farmCatRepo = $farmCatRepo;
	}

	public function all()
	{
		return $this->farmCatRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->farmCatRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->farmCatRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->farmCatRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->farmCatRepo->delete($id);
	}
}