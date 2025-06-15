<?php

namespace App\Repositories;

use App\Interfaces\LibrarianInterface;
use App\Models\Librarian;

class LibrarianRepository implements LibrarianInterface
{
	protected $librarian;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Librarian $librarian)
    {
        $this->librarian = $librarian;
    }

    public function all()
    {
        return $this->librarian->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->librarian->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->librarian->create($data);
    }

    public function getId($id)
    {
    	return $this->librarian->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->librarian->destroy($id);
    }
}