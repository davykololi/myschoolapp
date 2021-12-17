<?php

namespace App\Services;

use Auth;
use App\Repositories\RewardRepository as RewardRepo;
use Illuminate\Support\Str;
use App\Http\Requests\RewardFormRequest as StoreRequest;
use App\Http\Requests\RewardFormRequest as UpdateRequest;

class RewardService
{
	protected $rewardRepo;

	public function __construct(RewardRepo $rewardRepo)
	{
		$this->rewardRepo = $rewardRepo;
	}

	public function all()
	{
		return $this->rewardRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->rewardRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->rewardRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->rewardRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        $data['category_reward_id'] = $request->reward_category;

        return $data;
	}

	public function delete($id)
	{
		return $this->rewardRepo->delete($id);
	}
}