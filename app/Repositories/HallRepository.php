<?php

namespace App\Repositories;

use App\Interfaces\HallInterface;
use App\Models\Hall;

class HallRepository implements HallInterface
{
	protected $hall;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Hall $hall)
    {
        $this->hall = $hall;
    }

    public function all()
    {
        return $this->hall->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->hall->create($data);
    }

    public function getId($id)
    {
    	return $this->hall->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->hall->destroy($id);
    }
}