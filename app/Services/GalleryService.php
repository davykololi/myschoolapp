<?php

namespace App\Services;

use Auth;
use App\Repositories\GalleryRepository as GalleryRepo;
use Illuminate\Support\Str;
use App\Traits\ImageTwoUploadTrait;
use App\Http\Requests\Gallery\StoreFormRequest as StoreRequest;
use App\Http\Requests\Gallery\UpdateFormRequest as UpdateRequest;

class GalleryService
{
	use ImageTwoUploadTrait;
	protected $galleryRepo;

	public function __construct(GalleryRepo $galleryRepo)
	{
		$this->galleryRepo = $galleryRepo;
	}

	public function all()
	{
		return $this->galleryRepo->all();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->galleryRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->galleryRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->galleryRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
		$data['image'] = $this->verifyAndUpload($request,'image','/storage/storage/');
        $data['admin_id'] = Auth::id();
        $data['school_id'] = Auth::user()->school->id;
        $data['slug'] = Str::slug($request->title);

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only(['title','description','slug','keywords','is_published']);
		$data['image'] = $this->verifyAndUpload($request,'image','/storage/storage/');
		$data['admin_id'] = Auth::id();
        $data['school_id'] = Auth::user()->school->id;
        $data['slug'] = Str::slug($request->title);

        return $data;
	}

	public function delete($id)
	{
		return $this->galleryRepo->delete($id);
	}
}