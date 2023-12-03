<?php

namespace App\Repositories;

use App\Interfaces\MeetingInterface;
use App\Models\Meeting;

class MeetingRepository implements MeetingInterface
{
	protected $meeting;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Meeting $meeting)
    {
        $this->meeting = $meeting;
    }

    public function all()
    {
        return $this->meeting->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->meeting->create($data);
    }

    public function getId($id)
    {
    	return $this->meeting->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->meeting->destroy($id);
    }
}