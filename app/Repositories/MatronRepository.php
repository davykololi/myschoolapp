<?php

namespace App\Repositories;

use App\Interfaces\MatronInterface;
use App\Models\Matron;

class MatronRepository implements MatronInterface
{
	protected $matron;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Matron $matron)
    {
        $this->matron = $matron;
    }

    public function all()
    {
        return $this->matron->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->matron->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->matron->create($data);
    }

    public function getId($id)
    {
    	return $this->matron->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->matron->destroy($id);
    }
}