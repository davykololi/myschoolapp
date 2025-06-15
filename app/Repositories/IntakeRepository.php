<?php

namespace App\Repositories;

use App\Interfaces\IntakeInterface;
use App\Models\Intake;

class IntakeRepository implements IntakeInterface
{
	protected $intake;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Intake $intake)
    {
        $this->intake = $intake;
    }

    public function all()
    {
        return $this->intake->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->intake->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->intake->create($data);
    }

    public function getId($id)
    {
    	return $this->intake->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->intake->destroy($id);
    }
}