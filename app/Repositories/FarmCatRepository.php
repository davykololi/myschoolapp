<?php

namespace App\Repositories;

use App\Interfaces\FarmCatInterface;
use App\Models\CategoryFarm as FarmCat;

class FarmCatRepository implements FarmCatInterface
{
	protected $farmCat;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FarmCat $farmCat)
    {
        $this->farmCat = $farmCat;
    }

    public function all()
    {
        return $this->farmCat->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->farmCat->create($data);
    }

    public function getId($id)
    {
    	return $this->farmCat->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->farmCat->destroy($id);
    }
}