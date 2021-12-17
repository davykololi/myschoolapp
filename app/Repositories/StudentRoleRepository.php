<?php

namespace App\Repositories;

use App\Interfaces\StudentRoleInterface;
use App\Models\PositionStudent as StudRole;

class StudentRoleRepository implements StudentRoleInterface
{
	protected $studRole;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudRole $studRole)
    {
        $this->studRole = $studRole;
    }

    public function all()
    {
        return $this->studRole->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->studRole->create($data);
    }

    public function getId($id)
    {
    	return $this->studRole->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->studRole->destroy($id);
    }
}