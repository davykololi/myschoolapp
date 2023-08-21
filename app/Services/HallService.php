<?php

namespace App\Services;

use Auth;
use App\Repositories\HallRepository as HallRepo;
use Illuminate\Support\Str;
use App\Http\Requests\HallFormRequest as StoreRequest;
use App\Http\Requests\HallFormRequest as UpdateRequest;

class HallService
{
	protected $hallRepo;

	public function __construct(HallRepo $hallRepo)
	{
		$this->hallRepo = $hallRepo;
	}

	public function all()
	{
		return $this->hallRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->hallRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->hallRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->hallRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->all();
        $data['code'] = strtoupper(Str::random(15));
        $data['school_id'] = Auth::user()->school->id;
        $data['type'] = $request->hall_type;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only('name');
        $data['school_id'] = Auth::user()->school->id;
        $data['type'] = $request->hall_type;

        return $data;
	}

	public function delete($id)
	{
		return $this->hallRepo->delete($id);
	}
}