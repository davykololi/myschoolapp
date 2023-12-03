<?php

namespace App\Services;

use App\Repositories\SchoolRepository;
use Illuminate\Support\Str;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\SchoolFormRequest as StoreRequest;
use App\Http\Requests\SchoolFormRequest as UpdateRequest;

class SchoolService
{
	use ImageUploadTrait;
	protected $schoolRepo;

	public function __construct(SchoolRepository $schoolRepo)
	{
		$this->schoolRepo = $schoolRepo;
	}

	public function all()
	{
		return $this->schoolRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->schoolRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->schoolRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->schoolRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->all();
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $data['code'] = strtoupper(Str::random(15));
        $data['type'] = $request->school_type;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only('name','initials','head','ass_head','motto','vision','email','postal_address','mission','core_values');
        $data['type'] = $request->school_type;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->schoolRepo->delete($id);
	}
}