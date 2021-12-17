<?php

namespace App\Services;

use App\Repositories\SubjectCatRepository as SubjectCatRepo;
use Illuminate\Support\Str;
use App\Http\Requests\SubjectCatFormRequest as StoreRequest;
use App\Http\Requests\SubjectCatFormRequest as UpdateRequest;

class SubjectCatService
{
	protected $subjectCatRepo;

	public function __construct(SubjectCatRepo $subjectCatRepo)
	{
		$this->subjectCatRepo = $subjectCatRepo;
	}

	public function all()
	{
		return $this->subjectCatRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->subjectCatRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->subjectCatRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->subjectCatRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->subjectCatRepo->delete($id);
	}
}