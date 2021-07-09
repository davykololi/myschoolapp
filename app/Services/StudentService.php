<?php

namespace App\Services;

use Auth;
use App\Repositories\StudentRepository;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\StudentFormRequest as StoreRequest;
use App\Http\Requests\StudentFormRequest as UpdateRequest;

class StudenttService
{
	use ImageUploadTrait;
	protected $studentRepository;

	public function __construct(StudentRepository $studentRepository)
	{
		$this->studentRepository = $studentRepository;
	}

	public function eagerLoaded()
	{
		return $this->studentRepository->eagerLoaded();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createAdminData($request);

		return $this->postRepository->create($data);
	}

	public function superadminCreate(StoreRequest $request)
	{
		$data = $this->createSuperadminData($request);

		return $this->postRepository->create($data);
	}

	public function getId($id)
	{
		return $this->postRepository->getId($id);
	}

	public function adminData(UpdateRequest $request)
	{
		$data = $request->all();
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $data['admin_id'] = Auth::id();
        $data['category_id'] = $request->category;
        $data['is_published']  = $request->has('publish');

        return $data;
	}

	public function createAdminData(StoreRequest $request)
	{
		$result = $this->adminData($request);

		return $result;
	}

	public function updateAdminData(UpdateRequest $request,$id)
	{
		$result = $this->adminData($request);

		return $result;
	}

	public function createSuperadminData(StoreRequest $request)
	{
		$result = $this->superadminData($request);

		return $result;
	}

	public function updateSuperadminData(UpdateRequest $request,$id)
	{
		$result = $this->superadminData($request);

		return $result;
	}

	public function superadminData(UpdateRequest $request)
	{
		$data = $request->all();
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');
        $data['admin_id'] = $request->admin;
        $data['category_id'] = $request->category;
        $data['is_published']  = $request->has('publish');

        return $data;
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateAdminData($request,$id);

		return $this->postRepository->update($data,$id);
	}

	public function superadminUpdate(UpdateRequest $request,$id)
	{
		$data = $this->updateSuperadminData($request,$id);

		return $this->postRepository->update($data,$id);
	}

	public function delete($id)
	{
		return $this->postRepository->delete($id);
	}
}