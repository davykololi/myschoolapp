<?php 

namespace App\Interfaces;

interface ParentInterface
{
	public function all();

	public function eagerLoaded();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);

	public function paginate();
}