<?php

namespace App\Services;

use Auth;
use App\Repositories\StdSubjectRepository as StdSubjectRepo;
use Illuminate\Support\Str;
use App\Http\Requests\StdSubjectFormRequest as StoreRequest;
use App\Http\Requests\StdSubjectFormRequest as UpdateRequest;

class StdSubjectService
{
	protected $stdSubjectRepo;

	public function __construct(StdSubjectRepo $stdSubjectRepo)
	{
		$this->stdSubjectRepo = $stdSubjectRepo;
	}

	public function all()
	{
		return $this->stdSubjectRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->stdSubjectRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->stdSubjectRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->stdSubjectRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['subject_id'] = $request->subject;
        $data['school_id'] = auth()->user()->school->id;
        $data['stream_id'] = $request->stream;
        $data['teacher_id'] = $request->teacher;

        return $data;
	}

	public function delete($id)
	{
		return $this->stdSubjectRepo->delete($id);
	}
}