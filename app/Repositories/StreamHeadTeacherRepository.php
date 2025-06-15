<?php

namespace App\Repositories;

use App\Interfaces\StreamHeadTeacherInterface;
use App\Models\StreamHeadTeacher;

class StreamHeadTeacherRepository implements StreamHeadTeacherInterface
{
	protected $streamHeadTeacher;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamHeadTeacher $streamHeadTeacher)
    {
        $this->streamHeadTeacher = $streamHeadTeacher;
    }

    public function all()
    {
        return $this->streamHeadTeacher->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->streamHeadTeacher->eagerLoaded()->paginate(50);
    }

    public function create(array $data)
    {
    	return $this->streamHeadTeacher->create($data);
    }

    public function getId($id)
    {
    	return $this->streamHeadTeacher->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->streamHeadTeacher->destroy($id);
    }
}