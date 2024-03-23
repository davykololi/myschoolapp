<?php

namespace App\Services;

use App\Repositories\DepartmentSectionRepository;
use Illuminate\Support\Str;
use App\Http\Requests\DeptSectionFormRequest as StoreRequest;
use App\Http\Requests\DeptSectionFormRequest as UpdateRequest;

class DepartmentSectionService
{
	protected $deptSectionRepo;

	public function __construct(DepartmentSectionRepository $deptSectionRepo)
	{
		$this->deptSectionRepo = $deptSectionRepo;
	}

	public function all()
	{
		return $this->deptSectionRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->deptSectionRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->deptSectionRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->deptSectionRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['code'] = strtoupper(Str::random(15));
        $data['school_id'] = auth()->user()->school->id;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data = $request->only('name','description');
        $data['school_id'] = auth()->user()->school->id;

        return $data;
	}

	public function delete($id)
	{
		return $this->deptSectionRepo->delete($id);
	}
}