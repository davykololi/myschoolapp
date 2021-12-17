<?php

namespace App\Services;

use Auth;
use App\Repositories\StaffRoleRepository as StafRolRepo;
use Illuminate\Support\Str;
use App\Http\Requests\StaffRolFormRequest as StoreRequest;
use App\Http\Requests\StaffRolFormRequest as UpdateRequest;

class StaffRoleService
{
	protected $stafRolRepo;

	public function __construct(StafRolRepo $stafRolRepo)
	{
		$this->stafRolRepo = $stafRolRepo;
	}

	public function all()
	{
		return $this->stafRolRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->stafRolRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->stafRolRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->stafRolRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->stafRolRepo->delete($id);
	}
}