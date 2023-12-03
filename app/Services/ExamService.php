<?php

namespace App\Services;

use Auth;
use App\Repositories\ExamRepository as ExamRepo;
use Illuminate\Support\Str;
use App\Http\Requests\ExamFormRequest as StoreRequest;
use App\Http\Requests\ExamFormRequest as UpdateRequest;

class ExamService
{
	protected $examRepo;

	public function __construct(ExamRepo $examRepo)
	{
		$this->examRepo = $examRepo;
	}

	public function all()
	{
		return $this->examRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->examRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->examRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->examRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->all();
        $data['code'] = strtoupper(Str::random(15));
        $data['type'] = $request->exam_type;
        $data['school_id'] = Auth::user()->school->id;
        $data['year_id'] = $request->year;
        $data['term_id'] = $request->term;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only(['name','start_date','end_date']);
        $data['type'] = $request->exam_type;
        $data['school_id'] = Auth::user()->school->id;
        $data['year_id'] = $request->year;
        $data['term_id'] = $request->term;
        $data['status'] = $request->status;

        return $data;
	}

	public function delete($id)
	{
		return $this->examRepo->delete($id);
	}
}