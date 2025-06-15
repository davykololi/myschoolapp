<?php

namespace App\Services;

use Auth;
use App\Repositories\BookRepository;
use Illuminate\Support\Str;
use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;

class BookService
{
	protected $bookRepository;

	public function __construct(BookRepository $bookRepository)
	{
		$this->bookRepository = $bookRepository;
	}

	public function all()
	{
		return $this->bookRepository->all();
	}

	public function paginated()
	{
		return $this->bookRepository->paginated();
	}

	public function create(BookStoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->bookRepository->create($data);
	}

	public function update(BookUpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->bookRepository->update($data,$id);
	}

	public function getId($id)
	{
		return $this->bookRepository->getId($id);
	}

	public function createData(BookStoreRequest $request)
	{
		$data = $request->validated();
		$data['book_id'] = "BK/".mt_rand(100000,999999)."/".date("Y");
        $data['school_id'] = Auth::user()->school->id;
        $data['library_id'] = $request->library_id;
        $data['category_book_id'] = $request->category_book_id;

        return $data;
	}

	public function updateData(BookUpdateRequest $request)
	{
		$data = $request->only('title','rack_no','row_no','author','units','library_id','category_book_id');
        $data['school_id'] = Auth::user()->school->id;
        $data['library_id'] = $request->library;
        $data['category_book_id'] = $request->book_category_id;

        return $data;
	}

	public function delete($id)
	{
		return $this->bookRepository->delete($id);
	}
}