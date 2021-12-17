<?php

namespace App\Repositories;

use App\Interfaces\SubjectCatInterface;
use App\Models\CategorySubject;

class SubjectCatRepository implements SubjectCatInterface
{
	protected $subjectCat;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategorySubject $subjectCat)
    {
        $this->subjectCat = $subjectCat;
    }

    public function all()
    {
        return $this->subjectCat->eagerloaded();
    }

    public function create(array $data)
    {
    	return $this->subjectCat->create($data);
    }

    public function getId($id)
    {
    	return $this->subjectCat->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->subjectCat->destroy($id);
    }
}