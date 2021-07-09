<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Models\Student;

class StudentRepository implements StudentInterface
{
	protected $post;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function eagerLoaded()
    {
        return $this->student->with('school','libraries','teachers',)->get();
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