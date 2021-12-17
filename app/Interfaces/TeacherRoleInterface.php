<?php 

namespace App\Interfaces;

interface TeacherRoleInterface
{
	public function all();

	public function create(array $data);

	public function getId($id);

	public function update(array $data,$id);

	public function delete($id);

	public function principal();

	public function deputyPrincipal();

	public function scienceDeptHead();

	public function assistScienceDept();
}