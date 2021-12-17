<?php 

namespace App\Interfaces;

interface IntakeInterface
{
	public function all();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);
}