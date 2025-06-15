<?php

namespace App\Repositories;

use App\Interfaces\StreamSubjectInterface;
use App\Models\StreamSubject;

class StreamSubjectRepository implements StreamSubjectInterface
{
	protected $streamSubject;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StreamSubject $streamSubject)
    {
        $this->streamSubject = $streamSubject;
    }

    public function all()
    {
        return $this->streamSubject->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->streamSubject->eagerLoaded()->paginate(5);
    }

    public function create(array $data)
    {
    	return $this->streamSubject->create($data);
    }

    public function getId($id)
    {
    	return $this->streamSubject->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->streamSubject->destroy($id);
    }
}