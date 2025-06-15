<?php

namespace App\Repositories;

use App\Interfaces\BookGenreInterface;
use App\Models\BookGenre;

class BookGenreRepository implements BookGenreInterface
{
	protected $bookGenre;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookGenre $bookGenre)
    {
        $this->bookGenre = $bookGenre;
    }

    public function all()
    {
        return $this->bookGenre->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->bookGenre->eagerLoaded()->paginate(50);
    }

    public function create(array $data)
    {
    	return $this->bookGenre->create($data);
    }

    public function getId($id)
    {
    	return $this->bookGenre->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->bookGenre->destroy($id);
    }
}