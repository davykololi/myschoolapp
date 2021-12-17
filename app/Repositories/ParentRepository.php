<?php

namespace App\Repositories;

use App\Interfaces\ParentInterface;
use App\Models\MyParent;

class ParentRepository implements ParentInterface
{
	protected $par;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MyParent $par)
    {
        $this->par = $par;
    }

    public function all()
    {
        return $this->par->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->par->create($data);
    }

    public function getId($id)
    {
    	return $this->par->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->par->destroy($id);
    }
}