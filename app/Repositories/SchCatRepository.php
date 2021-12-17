<?php

namespace App\Repositories;

use App\Interfaces\SchCatInterface;
use App\Models\CategorySchool;

class SchCatRepository implements SchCatInterface
{
	protected $schCat;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategorySchool $schCat)
    {
        $this->schCat = $schCat;
    }

    public function all()
    {
        return $this->schCat->get();
    }

    public function create(array $data)
    {
    	return $this->schCat->create($data);
    }

    public function getId($id)
    {
    	return $this->schCat->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->schCat->destroy($id);
    }
}