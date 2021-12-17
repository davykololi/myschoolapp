<?php

namespace App\Services;

use App\Repositories\GameCatRepository as GameCatRepo;
use Illuminate\Support\Str;
use App\Http\Requests\GameCatFormRequest as StoreRequest;
use App\Http\Requests\GameCatFormRequest as UpdateRequest;

class GameCatService
{
	protected $gameCatRepo;

	public function __construct(GameCatRepo $gameCatRepo)
	{
		$this->gameCatRepo = $gameCatRepo;
	}

	public function all()
	{
		return $this->gameCatRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->gameCatRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->gameCatRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->gameCatRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->validated();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->gameCatRepo->delete($id);
	}
}