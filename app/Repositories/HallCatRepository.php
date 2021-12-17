<?php

namespace App\Repositories;

use App\Interfaces\HallCatInterface;
use App\Models\CategoryHall as HallCat;

class HallCatRepository implements HallCatInterface
{
	protected $hallCat;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HallCat $hallCat)
    {
        $this->hallCat = $hallCat;
    }

    public function all()
    {
        return $this->hallCat->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->hallCat->create($data);
    }

    public function getId($id)
    {
    	return $this->hallCat->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->hallCat->destroy($id);
    }
}