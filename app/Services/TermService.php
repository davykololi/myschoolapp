<?php

namespace App\Services;

use Auth;
use App\Models\School;
use App\Repositories\TermRepository;
use Illuminate\Support\Str;
use App\Http\Requests\TermFormRequest as StoreRequest;
use App\Http\Requests\TermFormRequest as UpdateRequest;

class TermService
{
	protected $termRepo;

	public function __construct(TermRepository $termRepo)
	{
		$this->termRepo = $termRepo;
	}

	public function all()
	{
		return $this->termRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->termRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->termRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->termRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->all();
        $data['school_id'] = Auth::user()->school->id;
        $schoolId = Auth::user()->school->id;
        $school = School::whereId($schoolId)->first();
        $data['code'] = strtoupper($school->initials."/".Str::random(5)."/".now()->year);

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only('name');
        $data['school_id'] = Auth::user()->school->id;
        $data['status'] = $request->status;
        $schoolId = Auth::user()->school->id;
        $school = School::whereId($schoolId)->first();
        $data['code'] = strtoupper($school->initials."/".Str::random(5)."/".now()->year);

        return $data;
	}

	public function delete($id)
	{
		return $this->termRepo->delete($id);
	}
}