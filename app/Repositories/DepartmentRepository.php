<?php

namespace App\Repositories;

use App\Interfaces\DepartmentInterface;
use App\Models\Department;

class DepartmentRepository implements DepartmentInterface
{
	protected $dept;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Department $dept)
    {
        $this->dept = $dept;
    }

    public function all()
    {
        return $this->dept->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->dept->create($data);
    }

    public function getId($id)
    {
    	return $this->dept->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->dept->destroy($id);
    }

    public function scienceDept()
    {
        return $this->dept->whereName('Science Department')->first();
    }
}