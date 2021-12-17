<?php

namespace App\Services;

use App\Repositories\FieldCatRepository as FieldCatRepo;
use Illuminate\Support\Str;
use App\Http\Requests\FieldCatFormRequest as StoreRequest;
use App\Http\Requests\FieldCatFormRequest as UpdateRequest;

class FieldCatService
{
	protected $fieldCatRepo;

	public function __construct(FieldCatRepo $fieldCatRepo)
	{
		$this->fieldCatRepo = $fieldCatRepo;
	}

	public function all()
	{
		return $this->fieldCatRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->fieldCatRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->fieldCatRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->fieldCatRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->fieldCatRepo->delete($id);
	}
}