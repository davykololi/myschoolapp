<?php

namespace App\Repositories;

use App\Interfaces\ImageGalleryInterface;
use App\Models\ImageGallery;

class ImageGalleryRepository implements ImageGalleryInterface
{
	protected $imageGallery;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ImageGallery $imageGallery)
    {
        $this->imageGallery = $imageGallery;
    }

    public function all()
    {
        return $this->imageGallery->eagerLoaded()->get();
    }

    public function latestImageGallery()
    {
        return $this->imageGallery->eagerLoaded()->latest('id')->get();
    }

    public function create(array $data)
    {
    	return $this->imageGallery->create($data);
    }

    public function getId($id)
    {
    	return $this->imageGallery->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->imageGallery->destroy($id);
    }
}