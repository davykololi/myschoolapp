<?php

namespace App\Repositories;

use App\Interfaces\BookInterface;
use App\Models\Book;

class BookRepository implements BookInterface
{
	protected $book;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function all()
    {
        return $this->book->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->book->eagerLoaded()->paginate(50);
    }

    public function create(array $data)
    {
    	return $this->book->create($data);
    }

    public function getId($id)
    {
    	return $this->book->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->book->destroy($id);
    }
}