<?php

namespace App\Services;

use Auth;
use App\Repositories\AssignmentRepository as AssignRepo;
use App\Traits\FilesUploadTrait;
use App\Http\Requests\AssignFormRequest as StoreRequest;
use App\Http\Requests\AssignFormRequest as UpdateRequest;

class AssignmentService
{
	use FilesUploadTrait;
	protected $assignRepo;

	public function __construct(AssignRepo $assignRepo)
	{
		$this->assignRepo = $assignRepo;
	}

	public function all()
	{
		return $this->assignRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->assignRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->assignRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->assignRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = Auth::user()->school->id;
        $data['file'] = $this->verifyAndUpload($request,'file','public/files/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only('name','date_given','deadline');
        $data['school_id'] = Auth::user()->school->id;
        $data['file'] = $this->verifyAndUpload($request,'file','public/files/');

        return $data;
	}

	public function delete($id)
	{
		return $this->assignRepo->delete($id);
	}
}