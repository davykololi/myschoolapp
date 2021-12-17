<?php

namespace App\Repositories;

use App\Interfaces\FieldCatInterface;
use App\Models\CategoryField as FieldCat;

class FieldCatRepository implements FieldCatInterface
{
	protected $fieldCat;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FieldCat $fieldCat)
    {
        $this->fieldCat = $fieldCat;
    }

    public function all()
    {
        return $this->fieldCat->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->fieldCat->create($data);
    }

    public function getId($id)
    {
    	return $this->fieldCat->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->fieldCat->destroy($id);
    }
}