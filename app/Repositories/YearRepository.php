<?php

namespace App\Repositories;

use App\Interfaces\YearInterface;
use App\Models\Year;

class YearRepository implements YearInterface
{
	protected $year;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Year $year)
    {
        $this->year = $year;
    }

    public function all()
    {
        return $this->year->latest('id')->get();
    }

    public function paginated()
    {
        return $this->year->latest('id')->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->year->create($data);
    }

    public function getId($id)
    {
    	return $this->year->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->year->destroy($id);
    }
}