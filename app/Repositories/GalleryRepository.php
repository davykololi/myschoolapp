<?php

namespace App\Repositories;

use App\Interfaces\GalleryInterface;
use App\Models\Gallery;

class GalleryRepository implements GalleryInterface
{
	protected $gallery;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    public function all()
    {
        return $this->gallery->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->gallery->create($data);
    }

    public function getId($id)
    {
    	return $this->gallery->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->gallery->destroy($id);
    }
}