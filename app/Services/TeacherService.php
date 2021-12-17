<?php

namespace App\Services;

use Auth;
use App\Repositories\TeacherRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\TeacherFormRequest as StoreRequest;
use App\Http\Requests\TeacherFormRequest as UpdateRequest;

class TeacherService
{
	use ImageUploadTrait;
	protected $teacherRepository;

	public function __construct(TeacherRepository $teacherRepository)
	{
		$this->teacherRepository = $teacherRepository;
	}

	public function all()
	{
		return $this->teacherRepository->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->teacherRepository->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->teacherRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->teacherRepository->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        $data['bg_id'] = $request->blood_group;
        $data['position_teacher_id'] = $request->teacher_role;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data = $request->only('title','name','email','image','gender','id_no','emp_no','dob','designation','address','phone_no','history');
        $data['school_id'] = auth()->user()->school->id;
        $data['bg_id'] = $request->blood_group;
        $data['position_teacher_id'] = $request->teacher_role;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->teacherRepository->delete($id);
	}
}