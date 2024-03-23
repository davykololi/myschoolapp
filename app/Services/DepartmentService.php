<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;
use Illuminate\Support\Str;
use App\Http\Requests\DeptFormRequest as StoreRequest;
use App\Http\Requests\DeptFormRequest as UpdateRequest;

class DepartmentService
{
	protected $deptRepository;

	public function __construct(DepartmentRepository $deptRepository)
	{
		$this->deptRepository = $deptRepository;
	}

	public function all()
	{
		return $this->deptRepository->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->deptRepository->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->deptRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->deptRepository->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['code'] = strtoupper(Str::random(15));
        $data['dept_section_id'] = $request->dept_section;
        $data['school_id'] = auth()->user()->school->id;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data = $request->only('name','phone_no','head_name','asshead_name','motto','vision','mission');
        $data['dept_section_id'] = $request->dept_section;
        $data['school_id'] = auth()->user()->school->id;

        return $data;
	}

	public function delete($id)
	{
		return $this->deptRepository->delete($id);
	}
}