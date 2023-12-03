<?php

namespace App\Repositories;

use App\Interfaces\RewardInterface;
use App\Models\Reward;

class RewardRepository implements RewardInterface
{
	protected $reward;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Reward $reward)
    {
        $this->reward = $reward;
    }

    public function all()
    {
        return $this->reward->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->reward->create($data);
    }

    public function getId($id)
    {
    	return $this->reward->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->reward->destroy($id);
    }
}