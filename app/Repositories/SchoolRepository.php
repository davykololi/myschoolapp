<?php

namespace App\Repositories;

use App\Interfaces\SchoolInterface;
use App\Models\School;

class SchoolRepository implements SchoolInterface
{
	protected $school;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(School $school)
    {
        $this->school = $school;
    }

    public function all()
    {
        return $this->school->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->school->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->school->create($data);
    }

    public function getId($id)
    {
    	return $this->school->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->school->destroy($id);
    }
}