<?php

namespace App\Repositories;

use App\Interfaces\DepartmentSectionInterface;
use App\Models\DepartmentSection;

class DepartmentSectionRepository implements DepartmentSectionInterface
{
	protected $deptSection;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DepartmentSection $deptSection)
    {
        $this->deptSection = $deptSection;
    }

    public function all()
    {
        return $this->deptSection->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->deptSection->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->deptSection->create($data);
    }

    public function getId($id)
    {
    	return $this->deptSection->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->deptSection->destroy($id);
    }
}