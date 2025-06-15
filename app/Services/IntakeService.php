<?php

namespace App\Services;

use Auth;
use App\Repositories\IntakeRepository;
use Illuminate\Support\Str;
use App\Http\Requests\IntakeFormRequest as StoreRequest;
use App\Http\Requests\IntakeFormRequest as UpdateRequest;

class IntakeService
{
	protected $intakeRepo;

	public function __construct(IntakeRepository $intakeRepo)
	{
		$this->intakeRepo = $intakeRepo;
	}

	public function all()
	{
		return $this->intakeRepo->paginated();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->intakeRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->intakeRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->intakeRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->all();
        $data['school_id'] = Auth::user()->school->id;

        return $data;
	}

	public function delete($id)
	{
		return $this->intakeRepo->delete($id);
	}
}