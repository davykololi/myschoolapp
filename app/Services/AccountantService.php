<?php

namespace App\Services;

use Auth;
use App\Repositories\AccountantRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AccFormRequest as StoreRequest;
use App\Http\Requests\AccFormRequest as UpdateRequest;

class AccountantService
{
	use ImageUploadTrait;
	protected $accRepo;

	public function __construct(AccountantRepository $accRepo)
	{
		$this->accRepo = $accRepo;
	}

	public function all()
	{
		return $this->accRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->accRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->accRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->accRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = Auth::user()->school->id;
        $data['role'] = $request->accountant_role;
        $data['blood_group'] = $request->blood_group;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data=$request->only('salutation','first_name','middle_name','last_name','dob','email','gender','address','phone_no','id_no','designation','emp_no','history');
        $data['school_id'] = Auth::user()->school->id;
        $data['role'] = $request->accountant_role;
        $data['blood_group'] = $request->blood_group;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->accRepo->delete($id);
	}
}