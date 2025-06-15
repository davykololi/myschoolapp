<?php

namespace App\Repositories;

use App\Interfaces\AwardInterface;
use App\Models\Award;

class AwardRepository implements AwardInterface
{
	protected $award;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Award $award)
    {
        $this->award = $award;
    }

    public function all()
    {
        return $this->award->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->award->create($data);
    }

    public function getId($id)
    {
    	return $this->award->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->award->destroy($id);
    }
}