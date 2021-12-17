<?php

namespace App\Services;

use App\Repositories\LibrarianRoleRepository;
use Illuminate\Support\Str;
use App\Http\Requests\LibrarianRoleFormRequest as StoreRequest;
use App\Http\Requests\LibrarianRoleFormRequest as UpdateRequest;

class LibrarianRoleService
{
	protected $librarianRoleRepo;

	public function __construct(LibrarianRoleRepository $librarianRoleRepo)
	{
		$this->librarianRoleRepo = $librarianRoleRepo;
	}

	public function all()
	{
		return $this->librarianRoleRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->data($request);

		return $this->librarianRoleRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->data($request);

		return $this->librarianRoleRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->librarianRoleRepo->getId($id);
	}

	public function data(StoreRequest $request)
	{
		$data = $request->all();
        $data['slug'] = Str::slug($request->name,'-');

        return $data;
	}

	public function delete($id)
	{
		return $this->librarianRoleRepo->delete($id);
	}
}