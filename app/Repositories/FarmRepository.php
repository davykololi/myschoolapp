<?php

namespace App\Repositories;

use App\Interfaces\FarmInterface;
use App\Models\Farm;

class FarmRepository implements FarmInterface
{
	protected $farm;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Farm $farm)
    {
        $this->farm = $farm;
    }

    public function all()
    {
        return $this->farm->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->farm->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->farm->create($data);
    }

    public function getId($id)
    {
    	return $this->farm->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->farm->destroy($id);
    }
}