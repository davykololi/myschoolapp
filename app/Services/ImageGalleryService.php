<?php

namespace App\Services;

use Auth;
use App\Repositories\ImageGalleryRepository as ImageGalleryRepo;
use Illuminate\Support\Str;
use App\Traits\ImageTwoUploadTrait;
use App\Http\Requests\Gallery\StoreFormRequest as StoreRequest;
use App\Http\Requests\Gallery\UpdateFormRequest as UpdateRequest;

class ImageGalleryService
{
	use ImageTwoUploadTrait;
	protected $imageGalleryRepo;

	public function __construct(ImageGalleryRepo $imageGalleryRepo)
	{
		$this->imageGalleryRepo = $imageGalleryRepo;
	}

	public function all()
	{
		return $this->imageGalleryRepo->all();
	}

	public function latestImageGallery()
	{
		return $this->imageGalleryRepo->latestImageGallery();
	}

	public function create(StoreRequest $request)
	{
		$data = $this->createData($request);

		return $this->imageGalleryRepo->create($data);
	}

	public function update(UpdateRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->imageGalleryRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->imageGalleryRepo->getId($id);
	}

	public function createData(StoreRequest $request)
	{
		$data = $request->validated();
		$data['image'] = $this->verifyAndUpload($request,'image','/storage/storage/');
        $data['admin_id'] = Auth::user()->admin->id;
        $data['school_id'] = Auth::user()->school->id;
        $data['slug'] = Str::slug($request->title);
        $data['section_id'] = $request->section;

        return $data;
	}

	public function updateData(UpdateRequest $request)
	{
		$data = $request->only(['title','description','slug','keywords','is_published']);
		$data['image'] = $this->verifyAndUpload($request,'image','/storage/storage/');
		$data['admin_id'] = Auth::user()->admin->id;
        $data['school_id'] = Auth::user()->school->id;
        $data['slug'] = Str::slug($request->title);
        $data['section_id'] = $request->section;

        return $data;
	}

	public function delete($id)
	{
		return $this->imageGalleryRepo->delete($id);
	}
}