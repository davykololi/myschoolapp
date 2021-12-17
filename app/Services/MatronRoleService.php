<?php

namespace App\Services;

use App\Repositories\MatronRoleRepository;
use Illuminate\Support\Str;
use App\Http\Requests\MatRoleFormRequest as StoreRequest;
use App\Http\Requests\MatRoleFormRequest as UpdateRequest;

class MatronRoleService
{
	protected $matRoleRepo;

	public function __construct(MatronRoleRepository $matRoleRepo)
	{
		$this->matRoleRepo = $matRoleRepo;
	}

	public function all()
	{
		return $this->matRoleRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->matRoleRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->matRoleRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->matRoleRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->all();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->matRoleRepo->delete($id);
	}
}