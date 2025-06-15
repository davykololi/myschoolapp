<?php

namespace App\Repositories;

use App\Interfaces\StudentInterface;
use App\Models\Student;

class StudentRepository implements StudentInterface
{
	protected $student;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function all()
    {
        return $this->student->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->student->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->student->create($data);
    }

    public function getId($id)
    {
    	return $this->student->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->student->destroy($id);
    }
}