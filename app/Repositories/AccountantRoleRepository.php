<?php

namespace App\Repositories;

use App\Interfaces\AccountantRoleInterface;
use App\Models\PositionAccountant;

class AccountantRoleRepository implements AccountantRoleInterface
{
	protected $accountantRole;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PositionAccountant $accountantRole)
    {
        $this->accountantRole = $accountantRole;
    }

    public function all()
    {
        return $this->accountantRole->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->accountantRole->create($data);
    }

    public function getId($id)
    {
    	return $this->accountantRole->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->accountantRole->destroy($id);
    }
}