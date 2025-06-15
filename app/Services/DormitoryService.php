<?php

namespace App\Services;

use Auth;
use App\Repositories\DormitoryRepository;
use Illuminate\Support\Str;
use App\Http\Requests\DormFormRequest as StoreRequest;
use App\Http\Requests\DormFormRequest as UpdateRequest;

class DormitoryService
{
	protected $dormRepo;

	public function __construct(DormitoryRepository $dormRepo)
	{
		$this->dormRepo = $dormRepo;
	}

	public function all()
	{
		return $this->dormRepo->paginated();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->dormRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->dormRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->dormRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->all();
        $data['code'] = strtoupper(Str::random(15));
        $data['school_id'] = auth()->user()->school->id;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only(['name','bed_no','dom_head','ass_head']);
        $data['school_id'] = auth()->user()->school->id;

        return $data;
	}

	public function delete($id)
	{
		return $this->dormRepo->delete($id);
	}
}