<?php 

namespace App\Interfaces;

interface ParentInterface
{
	public function withSchool();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);
}