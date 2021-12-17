<?php

namespace App\Services;

use Auth;
use App\Repositories\SubjectRepository;
use Illuminate\Support\Str;
use App\Http\Requests\SubjectFormRequest as StoreRequest;
use App\Http\Requests\SubjectFormRequest as UpdateRequest;

class SubjectService
{
	protected $subjectRepository;

	public function __construct(SubjectRepository $subjectRepository)
	{
		$this->subjectRepository = $subjectRepository;
	}

	public function all()
	{
		return $this->subjectRepository->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->subjectRepository->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->subjectRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->subjectRepository->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->all();
        $data['code'] = strtoupper(Str::random(15));
        $data['school_id'] = auth()->user()->school->id;
        $data['department_id'] = $request->department;
        $data['category_subject_id'] = $request->subject_category;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data = $request->only(['name']);
        $data['school_id'] = auth()->user()->school->id;
        $data['department_id'] = $request->department;
        $data['category_subject_id'] = $request->subject_category;

        return $data;
	}

	public function delete($id)
	{
		return $this->subjectRepository->delete($id);
	}
}