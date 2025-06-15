<?php

namespace App\Services;

use Auth;
use App\Repositories\BookGenreRepository;
use Illuminate\Support\Str;
use App\Http\Requests\BookGenreFormRequest as StoreRequest;
use App\Http\Requests\BookGenreFormRequest as UpdateRequest;

class BookGenreService
{
	protected $bookGenreRepository;

	public function __construct(BookGenreRepository $bookGenreRepository)
	{
		$this->bookGenreRepository = $bookGenreRepository;
	}

	public function all()
	{
		return $this->bookGenreRepository->all();
	}

	public function paginated()
	{
		return $this->bookGenreRepository->paginated();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->bookGenreRepository->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->bookGenreRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->bookGenreRepository->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->validated();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->bookGenreRepository->delete($id);
	}
}