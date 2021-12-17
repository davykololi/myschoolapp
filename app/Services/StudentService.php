<?php

namespace App\Services;

use Auth;
use App\Repositories\StudentRepository;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StudentFormRequest as StoreRequest;
use App\Http\Requests\StudentFormRequest as UpdateRequest;

class StudentService
{
	use ImageUploadTrait;
	protected $studentRepository;

	public function __construct(StudentRepository $studentRepository)
	{
		$this->studentRepository = $studentRepository;
	}

	public function all()
	{
		return $this->studentRepository->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->studentRepository->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->studentRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->studentRepository->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;
        $data['bg_id'] = $request->blood_group;
        $data['stream_id'] = $request->stream;
        $data['intake_id'] = $request->intake;
        $data['dormitory_id'] = $request->dormitory;
        $data['admin_id'] = Auth::id();
        $data['parent_id'] = $request->parent;
        $data['position_student_id'] = $request->student_role;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data=$request->only('title','name','adm_mark','admission_no','dob','doa','email','gender','address','phone_no','history');
        $data['school_id'] = auth()->user()->school->id;
        $data['bg_id'] = $request->blood_group;
        $data['stream_id'] = $request->stream;
        $data['intake_id'] = $request->intake;
        $data['dormitory_id'] = $request->dormitory;
        $data['admin_id'] = Auth::id();
        $data['parent_id'] = $request->parent;
        $data['position_student_id'] = $request->student_role;
        $data['image'] = $this->verifyAndUpload($request,'image','public/storage/');

        return $data;
	}

	public function delete($id)
	{
		return $this->studentRepository->delete($id);
	}
}