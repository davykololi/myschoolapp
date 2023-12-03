<?php

namespace App\Repositories;

use App\Interfaces\StreamSubjectTeacherInterface;
use App\Models\StreamSubjectTeacher as ClassSubject;

class StreamSubjectTeacherRepository implements StreamSubjectTeacherInterface
{
	protected $classSubject;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClassSubject $classSubject)
    {
        $this->classSubject = $classSubject;
    }

    public function all()
    {
        return $this->classSubject->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->classSubject->create($data);
    }

    public function getId($id)
    {
    	return $this->classSubject->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->classSubject->destroy($id);
    }
}