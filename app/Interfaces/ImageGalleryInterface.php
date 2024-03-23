<?php 

namespace App\Interfaces;

interface ImageGalleryInterface
{
	public function all();

	public function latestImageGallery();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);
}