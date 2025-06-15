<?php

namespace App\Services;

use Auth;
use App\Repositories\AwardRepository as AwardRepo;
use Illuminate\Support\Str;
use App\Http\Requests\AwardFormRequest as StoreRequest;
use App\Http\Requests\AwardFormRequest as UpdateRequest;

class AwardService
{
	protected $awardRepo;

	public function __construct(AwardRepo $awardRepo)
	{
		$this->awardRepo = $awardRepo;
	}

	public function all()
	{
		return $this->awardRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->awardRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->awardRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->awardRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        $data['type'] = $request->type;

        return $data;
	}

	public function delete($id)
	{
		return $this->awardRepo->delete($id);
	}
}