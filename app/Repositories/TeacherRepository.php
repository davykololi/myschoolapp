<?php

namespace App\Repositories;

use App\Interfaces\TeacherInterface;
use App\Models\Teacher;

class TeacherRepository implements TeacherInterface
{
	protected $teacher;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function all()
    {
        return $this->teacher->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->teacher->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->teacher->create($data);
    }

    public function getId($id)
    {
    	return $this->teacher->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->teacher->destroy($id);
    }
}