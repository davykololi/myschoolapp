<?php

namespace App\Repositories;

use App\Interfaces\DormitoryInterface;
use App\Models\Dormitory;

class DormitoryRepository implements DormitoryInterface
{
	protected $dom;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Dormitory $dom)
    {
        $this->dom = $dom;
    }

    public function all()
    {
        return $this->dom->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->dom->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->dom->create($data);
    }

    public function getId($id)
    {
    	return $this->dom->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->dom->destroy($id);
    }
}