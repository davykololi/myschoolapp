<?php

namespace App\Services;

use Auth;
use App\Repositories\ClubRepository as ClubRepo;
use Illuminate\Support\Str;
use App\Http\Requests\ClubFormRequest as StoreRequest;
use App\Http\Requests\ClubFormRequest as UpdateRequest;

class ClubService
{
	protected $clubRepo;

	public function __construct(ClubRepo $clubRepo)
	{
		$this->clubRepo = $clubRepo;
	}

	public function all()
	{
		return $this->clubRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->clubRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->clubRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->clubRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['code'] = strtoupper(Str::random(15));
        $data['school_id'] = Auth::user()->school->id;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only(['name','reg_date']);
        $data['school_id'] = Auth::user()->school->id;

        return $data;
	}

	public function delete($id)
	{
		return $this->clubRepo->delete($id);
	}
}