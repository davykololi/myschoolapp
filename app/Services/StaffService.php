<?php

namespace App\Services;

use Auth;
use App\Repositories\StaffRepository as StaffRepo;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StaffFormRequest as StoreRequest;
use App\Http\Requests\StaffFormRequest as UpdateRequest;

class StaffService
{
	use ImageUploadTrait;
	protected $staffRepo;

	public function __construct(StaffRepo $staffRepo)
	{
		$this->staffRepo = $staffRepo;
	}

	public function all()
	{
		return $this->staffRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->staffRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->staffRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->staffRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        $data['blood_group'] = $request->blood_group;
        $data['role'] = $request->staff_role;
        $data['admin_id'] = Auth::id();
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data = $request->only('salutation','first_name','middle_name','last_name','email','gender','emp_no','id_no','dob','designation','address','phone_no','history');
        $data['school_id'] = auth()->user()->school_id;
        $data['blood_group'] = $request->blood_group;
        $data['role'] = $request->staff_role;
        $data['admin_id'] = Auth::id();
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->staffRepo->delete($id);
	}
}