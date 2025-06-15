<?php

namespace App\Services;

use Auth;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserFormRequest as StoreRequest;
use App\Http\Requests\UserFormRequest as UpdateRequest;

class UserService
{
	protected $userRepo;

	public function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}

	public function all()
	{
		return $this->userRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->userRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->userRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->userRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['password'] = Hash::make($request->password);
		$data['school_id'] = Auth::user()->school->id;
	
        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data = $request->only('salutation','first_name','middle_name','last_name','email','gender');
		$data['school_id'] = Auth::user()->school->id;

        return $data;
	}

	public function delete($id)
	{
		return $this->userRepo->delete($id);
	}
}