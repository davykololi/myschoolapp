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
        return $this->exam->eagerLoaded()->get();
    }

    public function create(array $data)
    {
        try {
            return $this->exam->create($data);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create exam. '.$e->getMessage());
        }
    }

    public function getId($id)
    {
        try {
            return $this->exam->findOrFail($id);
        } catch (\Exception $e) {
            throw new \Exception('Failed to show exam. '.$e->getMessage());
        }
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
        try {
            return $record->update($data);
        } catch (\Exception $e) {
            throw new \Exception('Failed to update exam. '.$e->getMessage());
        }	
    }

    public function delete($id)
    {
        try {
            return $this->exam->destroy($id);
        } catch (\Exception $e) {
            throw new \Exception('Failed to delete exam. '.$e->getMessage());
        }
    }
}