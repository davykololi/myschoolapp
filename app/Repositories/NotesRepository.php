<?php

namespace App\Repositories;

use App\Interfaces\NotesInterface;
use App\Models\Note as Notes;

class NotesRepository implements NotesInterface
{
	protected $notes;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Notes $notes)
    {
        $this->notes = $notes;
    }

    public function all()
    {
        return $this->notes->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->notes->create($data);
    }

    public function getId($id)
    {
    	return $this->notes->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->notes->destroy($id);
    }
}