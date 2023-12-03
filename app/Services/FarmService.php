<?php

namespace App\Services;

use Auth;
use App\Repositories\FarmRepository as FarmRepo;
use Illuminate\Support\Str;
use App\Http\Requests\FarmFormRequest as StoreRequest;
use App\Http\Requests\FarmFormRequest as UpdateRequest;

class FarmService
{
	protected $farmRepo;

	public function __construct(FarmRepo $farmRepo)
	{
		$this->farmRepo = $farmRepo;
	}

	public function all()
	{
		return $this->farmRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->farmRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->farmRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->farmRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->all();
        $data['code'] = strtoupper(Str::random(15));
        $data['school_id'] = Auth::user()->school->id;
        $data['type'] = $request->farm_type;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only(['name']);
        $data['school_id'] = Auth::user()->school->id;
        $data['type'] = $request->farm_type;

        return $data;
	}

	public function delete($id)
	{
		return $this->farmRepo->delete($id);
	}
}