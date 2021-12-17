<?php

namespace App\Repositories;

use App\Interfaces\SubjectInterface;
use App\Models\Subject;

class SubjectRepository implements SubjectInterface
{
	protected $subject;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }

    public function all()
    {
        return $this->subject->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->subject->create($data);
    }

    public function getId($id)
    {
    	return $this->subject->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->subject->destroy($id);
    }
}