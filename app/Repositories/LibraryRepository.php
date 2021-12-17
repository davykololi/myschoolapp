<?php

namespace App\Repositories;

use App\Interfaces\LibraryInterface;
use App\Models\Library as Libo;

class LibraryRepository implements LibraryInterface
{
	protected $libo;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Libo $libo)
    {
        $this->libo = $libo;
    }

    public function all()
    {
        return $this->libo->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->libo->create($data);
    }

    public function getId($id)
    {
    	return $this->libo->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->libo->destroy($id);
    }
}