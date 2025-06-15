<?php

namespace App\Services;

use Auth;
use App\Repositories\AccountantRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CommonUserFormRequest as StoreRequest;
use App\Http\Requests\CommonUserFormRequest as UpdateRequest;

class AccountantService
{
	use ImageUploadTrait;
	protected $accRepo, $userId;

	public function __construct(AccountantRepository $accRepo)
	{
		$this->accRepo = $accRepo;
	}

	public function all()
	{
		return $this->accRepo->paginated();
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
        $data['position'] = $request->position;
        $data['blood_group'] = $request->blood_group;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $data['user_id'] = Auth::user()->id;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data=$request->only('dob','gender','current_address','permanent_address','phone_no','id_no','designation','emp_no','history');
        $data['school_id'] = Auth::user()->school->id;
        $data['position'] = $request->position;
        $data['blood_group'] = $request->blood_group;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $data['user_id'] = Auth::user()->id;

        return $data;
	}

	public function delete($id)
	{
		return $this->accRepo->delete($id);
	}

	public function getUserId($userId)
	{
		return $userId;
	}
}