<?php

namespace App\Services;

use Auth;
use App\Repositories\StudentRoleRepository as StudRoleRepo;
use Illuminate\Support\Str;
use App\Http\Requests\StudRoleFormRequest as StoreRequest;
use App\Http\Requests\StudRoleFormRequest as UpdateRequest;

class StudentRoleService
{
	protected $studRoleRepo;

	public function __construct(StudRoleRepo $studRoleRepo)
	{
		$this->studRoleRepo = $studRoleRepo;
	}

	public function all()
	{
		return $this->studRoleRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->studRoleRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->studRoleRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->studRoleRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->all();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->studRoleRepo->delete($id);
	}
}