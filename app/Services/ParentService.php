<?php

namespace App\Services;

use Auth;
use App\Repositories\ParentRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ParentFormRequest as StoreRequest;
use App\Http\Requests\ParentFormRequest as UpdateRequest;

class ParentService
{
	use ImageUploadTrait;
	protected $parentRepository;

	public function __construct(ParentRepository $parentRepository)
	{
		$this->parentRepository = $parentRepository;
	}

	public function all()
	{
		return $this->parentRepository->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->parentRepository->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->parentRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->parentRepository->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        $data['bg_id'] = $request->blood_group;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data=$request->only('title','name','dob','email','gender','address','phone_no','id_no','designation','emp_no');
        $data['school_id'] = auth()->user()->school->id;
        $data['bg_id'] = $request->blood_group;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->parentRepository->delete($id);
	}
}