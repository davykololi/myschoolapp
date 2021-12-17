<?php

namespace App\Repositories;

use App\Interfaces\StdSubjectInterface;
use App\Models\StandardSubject as ClassSubject;

class StdSubjectRepository implements StdSubjectInterface
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