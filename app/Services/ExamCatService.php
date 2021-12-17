<?php

namespace App\Services;

use App\Repositories\ExamCatRepository as ExamCatRepo;
use Illuminate\Support\Str;
use App\Http\Requests\ExamCatFormRequest as StoreRequest;
use App\Http\Requests\ExamCatFormRequest as UpdateRequest;

class ExamCatService
{
	protected $examCatRepo;

	public function __construct(ExamCatRepo $examCatRepo)
	{
		$this->examCatRepo = $examCatRepo;
	}

	public function all()
	{
		return $this->examCatRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->examCatRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->examCatRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->examCatRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->all();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->examCatRepo->delete($id);
	}
}