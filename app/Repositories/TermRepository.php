<?php

namespace App\Repositories;

use App\Interfaces\TermInterface;
use App\Models\Term;

class TermRepository implements TermInterface
{
	protected $term;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Term $term)
    {
        $this->term = $term;
    }

    public function all()
    {
        return $this->term->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->term->create($data);
    }

    public function getId($id)
    {
    	return $this->term->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->term->destroy($id);
    }
}