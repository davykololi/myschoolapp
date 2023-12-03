<?php

namespace App\Services;

use Auth;
use App\Repositories\ClassRepository;
use Illuminate\Support\Str;
use App\Http\Requests\ClassFormRequest as StoreRequest;
use App\Http\Requests\ClassFormRequest as UpdateRequest;

class ClassService
{
	protected $classRepository;

	public function __construct(ClassRepository $classRepository)
	{
		$this->classRepository = $classRepository;
	}

	public function all()
	{
		return $this->classRepository->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->classRepository->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->classRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->classRepository->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->all();
        $data['school_id'] = Auth::user()->school->id;
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->classRepository->delete($id);
	}
}