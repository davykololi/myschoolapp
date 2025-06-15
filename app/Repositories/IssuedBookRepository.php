<?php

namespace App\Repositories;

use App\Interfaces\IssuedBookInterface;
use App\Models\IssuedBook;

class IssuedBookRepository implements IssuedBookInterface
{
	protected $issuedBook;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IssuedBook $issuedBook)
    {
        $this->issuedBook = $issuedBook;
    }

    public function all()
    {
        return $this->issuedBook->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->issuedBook->eagerLoaded()->paginate(50);
    }

    public function create(array $data)
    {
    	return $this->issuedBook->create($data);
    }

    public function getId($id)
    {
    	return $this->issuedBook->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->issuedBook->destroy($id);
    }
}