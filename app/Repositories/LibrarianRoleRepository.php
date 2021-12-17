<?php

namespace App\Repositories;

use App\Interfaces\LibrarianRoleInterface;
use App\Models\PositionLibrarian;

class LibrarianRoleRepository implements LibrarianRoleInterface
{
	protected $librarianRole;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PositionLibrarian $librarianRole)
    {
        $this->librarianRole = $librarianRole;
    }

    public function all()
    {
        return $this->librarianRole->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->librarianRole->create($data);
    }

    public function getId($id)
    {
    	return $this->librarianRole->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->librarianRole->destroy($id);
    }
}