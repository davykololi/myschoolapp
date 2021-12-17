<?php 

namespace App\Interfaces;

interface HallCatInterface
{
	public function all();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);
}