<?php

namespace App\Repositories;

use App\Interfaces\StaffRoleInterface;
use App\Models\PositionStaff;

class StaffRoleRepository implements StaffRoleInterface
{
	protected $subStRole;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PositionStaff $subStRole)
    {
        $this->subStRole = $subStRole;
    }

    public function all()
    {
        return $this->subStRole->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->subStRole->create($data);
    }

    public function getId($id)
    {
    	return $this->subStRole->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->subStRole->destroy($id);
    }
}