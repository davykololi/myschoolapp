<?php

namespace App\Services;

use Auth;
use App\Repositories\LibraryRepository as LibRepo;
use Illuminate\Support\Str;
use App\Http\Requests\LibFormRequest as StoreRequest;
use App\Http\Requests\LibFormRequest as UpdateRequest;

class LibraryService
{
	protected $libRepo;

	public function __construct(LibRepo $libRepo)
	{
		$this->libRepo = $libRepo;
	}

	public function all()
	{
		return $this->libRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->libRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->libRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->libRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->all();
        $data['code'] = strtoupper(Str::random(15));
        $data['school_id'] = Auth::user()->school->id;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
        $data = $request->only('name','phone_no');
        $data['school_id'] = Auth::user()->school->id;

        return $data;
	}

	public function delete($id)
	{
		return $this->libRepo->delete($id);
	}
}