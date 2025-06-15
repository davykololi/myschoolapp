<?php

namespace App\Services;

use Auth;
use App\Repositories\IssuedBookRepository;
use Illuminate\Support\Str;
use App\Http\Requests\IssuedBookFormRequest as StoreRequest;
use App\Http\Requests\IssuedBookFormRequest as UpdateRequest;

class IssuedBookService
{
	protected $issuedBookRepository;

	public function __construct(IssuedBookRepository $issuedBookRepository)
	{
		$this->issuedBookRepository = $issuedBookRepository;
	}

	public function all()
	{
		return $this->issuedBookRepository->all();
	}

	public function paginated()
	{
		return $this->issuedBookRepository->paginated();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->issuedBookRepository->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->issuedBookRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->issuedBookRepository->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
        $data['student_id'] = $request->student_id;
        $data['book_id'] = $request->book_id;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->validated();
        $data['student_id'] = $request->student_id;
        $data['book_id'] = $request->book_id;

        return $data;
	}

	public function delete($id)
	{
		return $this->issuedBookRepository->delete($id);
	}
}