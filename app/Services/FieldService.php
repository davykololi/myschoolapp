<?php

namespace App\Services;

use Auth;
use App\Repositories\FieldRepository as FieldRepo;
use Illuminate\Support\Str;
use App\Http\Requests\FieldFormRequest as StoreRequest;
use App\Http\Requests\FieldFormRequest as UpdateRequest;

class FieldService
{
	protected $fieldRepo;

	public function __construct(FieldRepo $fieldRepo)
	{
		$this->fieldRepo = $fieldRepo;
	}

	public function all()
	{
		return $this->fieldRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->fieldRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->fieldRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->fieldRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->all();
        $data['code'] = strtoupper(Str::random(15));
        $data['school_id'] = Auth::user()->school->id;
        $data['type'] = $request->type;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only(['name']);
        $data['school_id'] = Auth::user()->school->id;
        $data['type'] = $request->type;

        return $data;
	}

	public function delete($id)
	{
		return $this->fieldRepo->delete($id);
	}
}