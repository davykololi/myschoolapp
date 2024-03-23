<?php

namespace App\Repositories;

use App\Interfaces\ParentInterface;
use App\Models\MyParent;

class ParentRepository implements ParentInterface
{
	protected $my_parent;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MyParent $my_parent)
    {
        $this->my_parent = $my_parent;
    }

    public function all()
    {
        return $this->my_parent->eagerLoaded()->get();
    }

    public function eagerLoaded()
    {
        return $this->my_parent->eagerLoaded();
    }

    public function paginate()
    {
        return $this->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->my_parent->create($data);
    }

    public function getId($id)
    {
    	return $this->my_parent->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->my_parent->destroy($id);
    }
}