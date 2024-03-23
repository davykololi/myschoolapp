<?php

namespace App\Repositories;

use App\Interfaces\SubordinateInterface;
use App\Models\Subordinate;

class SubordinateRepository implements SubordinateInterface
{
	protected $subordinate;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Subordinate $subordinate)
    {
        $this->subordinate = $subordinate;
    }

    public function all()
    {
        return $this->subordinate->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->subordinate->create($data);
    }

    public function getId($id)
    {
    	return $this->subordinate->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->subordinate->destroy($id);
    }
}