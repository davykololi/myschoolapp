<?php

namespace App\Services;

use App\Repositories\AccountantRoleRepository;
use Illuminate\Support\Str;
use App\Http\Requests\AccRoleFormRequest as StoreRequest;
use App\Http\Requests\AccRoleFormRequest as UpdateRequest;

class AccountantRoleService
{
	protected $accountantRoleRepo;

	public function __construct(AccountantRoleRepository $accountantRoleRepo)
	{
		$this->accountantRoleRepo = $accountantRoleRepo;
	}

	public function all()
	{
		return $this->accountantRoleRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->accountantRoleRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->accountantRoleRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->accountantRoleRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->all();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->accountantRoleRepo->delete($id);
	}
}