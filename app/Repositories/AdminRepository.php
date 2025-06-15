<?php

namespace App\Repositories;

use App\Interfaces\AdminInterface;
use App\Models\Admin;

class AdminRepository implements AdminInterface
{
	protected $admin;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function all()
    {
        return $this->admin->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->admin->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->admin->create($data);
    }

    public function getId($id)
    {
    	return $this->admin->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->admin->destroy($id);
    }
}