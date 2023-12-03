<?php

namespace App\Services;

use Auth;
use App\Repositories\MatronRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\MatronFormRequest as StoreRequest;
use App\Http\Requests\MatronFormRequest as UpdateRequest;

class MatronService
{
	use ImageUploadTrait;
	protected $matRepo;

	public function __construct(MatronRepository $matRepo)
	{
		$this->matRepo = $matRepo;
	}

	public function all()
	{
		return $this->matRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->matRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->matRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->matRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = Auth::user()->school->id;
        $data['blood_group'] = $request->blood_group;
        $data['role'] = $request->matron_role;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data=$request->only('salutation','first_name','middle_name','last_name','dob','email','gender','address','phone_no','id_no','designation','emp_no','history');
        $data['school_id'] = Auth::user()->school->id;
        $data['blood_group'] = $request->blood_group;
        $data['role'] = $request->matron_role;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->matRepo->delete($id);
	}
}