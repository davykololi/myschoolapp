<?php

namespace App\Services;

use Auth;
use App\Repositories\LibrarianRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LibrarianFormRequest as StoreRequest;
use App\Http\Requests\LibrarianFormRequest as UpdateRequest;

class LibrarianService
{
	use ImageUploadTrait;
	protected $librarianRepo;

	public function __construct(LibrarianRepository $librarianRepo)
	{
		$this->librarianRepo = $librarianRepo;
	}

	public function all()
	{
		return $this->librarianRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->librarianRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->librarianRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->librarianRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = Auth::user()->school->id;
		$data['library_id'] = $request->library;
		$data['blood_group'] = $request->blood_group;
        $data['role'] = $request->librarian_role;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data=$request->only('salutation','first_name','middle_name','last_name','dob','email','gender','address','phone_no','id_no','designation','emp_no','history');
       	$data['school_id'] = Auth::user()->school->id;
		$data['library_id'] = $request->library;
		$data['blood_group'] = $request->blood_group;
        $data['role'] = $request->librarian_role;
       	$data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->librarianRepo->delete($id);
	}
}