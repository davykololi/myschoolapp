<?php 

namespace App\Interfaces;

interface StudentInterface
{
	public function eagerLoaded();

	public function authPosts();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);
}