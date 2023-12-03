<?php

namespace App\Repositories;

use App\Interfaces\TimeTableInterface;
use App\Models\TimeTable;

class TimetableRepository implements TimetableInterface
{
	protected $timetable;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TimeTable $timetable)
    {
        $this->timetable = $timetable;
    }

    public function all()
    {
        return $this->timetable->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->timetable->create($data);
    }

    public function getId($id)
    {
    	return $this->timetable->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->timetable->destroy($id);
    }
}