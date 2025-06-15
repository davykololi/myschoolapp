<?php

namespace App\Repositories;

use App\Interfaces\ClassInterface;
use App\Models\MyClass;

class ClassRepository implements ClassInterface
{
	protected $clas;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MyClass $clas)
    {
        $this->clas = $clas;
    }

    public function all()
    {
        return $this->clas->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->clas->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->clas->create($data);
    }

    public function getId($id)
    {
    	return $this->clas->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->clas->destroy($id);
    }
}