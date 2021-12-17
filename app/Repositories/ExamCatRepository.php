<?php

namespace App\Repositories;

use App\Interfaces\ExamCatInterface;
use App\Models\CategoryExam as ExamCat;

class ExamCatRepository implements ExamCatInterface
{
	protected $examCat;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExamCat $examCat)
    {
        $this->examCat = $examCat;
    }

    public function all()
    {
        return $this->examCat->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->examCat->create($data);
    }

    public function getId($id)
    {
    	return $this->examCat->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->examCat->destroy($id);
    }
}