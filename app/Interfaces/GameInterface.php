<?php 

namespace App\Interfaces;

interface GameInterface
{
	public function all();

	public function paginated();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);
}