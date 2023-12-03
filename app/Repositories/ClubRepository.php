<?php

namespace App\Repositories;

use App\Interfaces\ClubInterface;
use App\Models\Club;

class ClubRepository implements ClubInterface
{
	protected $club;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Club $club)
    {
        $this->club = $club;
    }

    public function all()
    {
        return $this->club->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->club->create($data);
    }

    public function getId($id)
    {
    	return $this->club->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->club->destroy($id);
    }
}