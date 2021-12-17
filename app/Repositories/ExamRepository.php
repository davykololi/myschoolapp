<?php

namespace App\Repositories;

use App\Interfaces\ExamInterface;
use App\Models\Exam;

class ExamRepository implements ExamInterface
{
	protected $exam;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Exam $exam)
    {
        $this->exam = $exam;
    }

    public function all()
    {
        return $this->exam->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->exam->create($data);
    }

    public function getId($id)
    {
    	return $this->exam->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->exam->destroy($id);
    }
}