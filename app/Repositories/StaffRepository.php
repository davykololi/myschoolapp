<?php

namespace App\Repositories;

use App\Interfaces\StaffInterface;
use App\Models\Staff;

class StaffRepository implements StaffInterface
{
	protected $staff;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    public function all()
    {
        return $this->staff->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->staff->create($data);
    }

    public function getId($id)
    {
    	return $this->staff->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->staff->destroy($id);
    }
}