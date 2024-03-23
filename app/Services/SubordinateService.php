<?php

namespace App\Services;

use Auth;
use App\Repositories\SubordinateRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CommonUserFormRequest as StoreRequest;
use App\Http\Requests\CommonUserFormRequest as UpdateRequest;

class SubordinateService
{
	use ImageUploadTrait;
	protected $subordinateRepo;

	public function __construct(SubordinateRepository $subordinateRepo)
	{
		$this->subordinateRepo = $subordinateRepo;
	}

	public function all()
	{
		return $this->subordinateRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->subordinateRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->subordinateRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->subordinateRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        $data['blood_group'] = $request->blood_group;
        $data['position'] = $request->staff_position;
        $data['admin_id'] = Auth::user()->admin->id;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data = $request->only('salutation','first_name','middle_name','last_name','email','gender','emp_no','id_no','dob','designation','address','phone_no','history');
        $data['school_id'] = auth()->user()->school_id;
        $data['blood_group'] = $request->blood_group;
        $data['position'] = $request->staff_position;
        $data['admin_id'] = Auth::user()->admin->id;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->subordinateRepo->delete($id);
	}
}