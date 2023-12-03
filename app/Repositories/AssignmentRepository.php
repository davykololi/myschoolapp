<?php

namespace App\Repositories;

use App\Interfaces\AssignmentInterface;
use App\Models\Assignment;

class AssignmentRepository implements AssignmentInterface
{
	protected $assignment;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Assignment $assignment)
    {
        $this->assignment = $assignment;
    }

    public function all()
    {
        return $this->assignment->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->assignment->create($data);
    }

    public function getId($id)
    {
    	return $this->assignment->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->assignment->destroy($id);
    }
}