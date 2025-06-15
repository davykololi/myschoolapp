<?php

namespace App\Services;

use Auth;
use App\Repositories\AdminRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CommonUserFormRequest as StoreRequest;
use App\Http\Requests\CommonUserFormRequest as UpdateRequest;

class AdminService
{
	use ImageUploadTrait;
	protected $adminRepo;

	public function __construct(AdminRepository $adminRepo)
	{
		$this->adminRepo = $adminRepo;
	}

	public function all()
	{
		return $this->adminRepo->paginated();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->adminRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->adminRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->adminRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['superadmin_id'] = Auth::user()->superadmin->id;
		$data['school_id'] = Auth::user()->school->id;
		$data['blood_group'] = $request->blood_group;
        $data['position'] = $request->admin_position;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data = $request->only('salutation','first_name','middle_name','last_name','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','history');
        $data['superadmin_id'] = Auth::user()->superadmin->id;
		$data['school_id'] = Auth::user()->school->id;
		$data['blood_group'] = $request->blood_group;
        $data['position'] = $request->admin_position;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->adminRepo->delete($id);
	}
}