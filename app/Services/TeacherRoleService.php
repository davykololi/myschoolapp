<?php

namespace App\Services;

use App\Repositories\TeacherRoleRepository;
use Illuminate\Support\Str;
use App\Http\Requests\TeacherRoleFormRequest as StoreRequest;
use App\Http\Requests\TeacherRoleFormRequest as UpdateRequest;

class TeacherRoleService
{
	protected $teacherRoleRepo;

	public function __construct(TeacherRoleRepository $teacherRoleRepo)
	{
		$this->teacherRoleRepo = $teacherRoleRepo;
	}

	public function all()
	{
		return $this->teacherRoleRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->teacherRoleRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->teacherRoleRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->teacherRoleRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->all();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->teacherRoleRepo->delete($id);
	}
}