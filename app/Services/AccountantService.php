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
        $data['school_id'] = $request->school;
        $data['bg_id'] = $request->blood_group;
        $data['position_accountant_id'] = $request->accountant_role;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data=$request->only('title','name','dob','email','gender','address','phone_no','id_no','designation','emp_no','history');
        $data['school_id'] = $request->school;
        $data['bg_id'] = $request->blood_group;
        $data['position_accountant_id'] = $request->accountant_role;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->accRepo->delete($id);
	}
}