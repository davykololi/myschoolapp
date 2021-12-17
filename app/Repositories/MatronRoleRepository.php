<?php

namespace App\Repositories;

use App\Interfaces\MatronRoleInterface;
use App\Models\PositionMatron;

class MatronRoleRepository implements MatronRoleInterface
{
	protected $matronRole;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PositionMatron $matronRole)
    {
        $this->matronRole = $matronRole;
    }

    public function all()
    {
        return $this->matronRole->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->matronRole->create($data);
    }

    public function getId($id)
    {
    	return $this->matronRole->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->matronRole->destroy($id);
    }
}