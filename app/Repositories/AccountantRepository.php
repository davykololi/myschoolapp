<?php

namespace App\Repositories;

use App\Interfaces\AccountantInterface;
use App\Models\Accountant;

class AccountantRepository implements AccountantInterface
{
	protected $acc;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Accountant $acc)
    {
        $this->acc = $acc;
    }

    public function all()
    {
        return $this->acc->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->acc->eagerLoaded()->paginate(15);
    }

    public function create(array $data)
    {
    	return $this->acc->create($data);
    }

    public function getId($id)
    {
    	return $this->acc->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->acc->destroy($id);
    }
}