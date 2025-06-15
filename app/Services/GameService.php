<?php

namespace App\Services;

use Auth;
use App\Repositories\GameRepository as GameRepo;
use Illuminate\Support\Str;
use App\Http\Requests\GameFormRequest as StoreRequest;
use App\Http\Requests\GameFormRequest as UpdateRequest;

class GameService
{
	protected $gameRepo;

	public function __construct(GameRepo $gameRepo)
	{
		$this->gameRepo = $gameRepo;
	}

	public function all()
	{
		return $this->gameRepo->paginated();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->gameRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->gameRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->gameRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->all();
        $data['code'] = strtoupper(Str::random(15));
        $data['school_id'] = Auth::user()->school->id;
        $data['type'] = $request->type;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only(['name']);
        $data['school_id'] = Auth::user()->school->id;
        $data['type'] = $request->type;

        return $data;
	}

	public function delete($id)
	{
		return $this->gameRepo->delete($id);
	}
}