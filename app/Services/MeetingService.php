<?php

namespace App\Services;

use Auth;
use App\Repositories\MeetingRepository as MeetingRepo;
use Illuminate\Support\Str;
use App\Http\Requests\MeetingFormRequest as StoreRequest;
use App\Http\Requests\MeetingFormRequest as UpdateRequest;

class MeetingService
{
	protected $meetingRepo;

	public function __construct(MeetingRepo $meetingRepo)
	{
		$this->meetingRepo = $meetingRepo;
	}

	public function all()
	{
		return $this->meetingRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->meetingRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->meetingRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->meetingRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['code'] = strtoupper(Str::random(15));
        $data['school_id'] = auth()->user()->school->id;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only(['name','agenda','date','venue','start_at','end_at']);
        $data['school_id'] = auth()->user()->school->id;

        return $data;
	}

	public function delete($id)
	{
		return $this->meetingRepo->delete($id);
	}
}