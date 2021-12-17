<?php

namespace App\Repositories;

use App\Interfaces\TeacherRoleInterface;
use App\Models\PositionTeacher;

class TeacherRoleRepository implements TeacherRoleInterface
{
	protected $teacherRole;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PositionTeacher $teacherRole)
    {
        $this->teacherRole = $teacherRole;
    }

    public function all()
    {
        return $this->teacherRole->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->teacherRole->create($data);
    }

    public function getId($id)
    {
    	return $this->teacherRole->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->teacherRole->destroy($id);
    }

    public function principal()
    {
        return $this->teacherRole->whereName('The Principal')->first();
    }

    public function deputyPrincipal()
    {
        return $this->teacherRole->whereName('The Deputy Principal')->first();
    }

    public function scienceDeptHead()
    {
        return $this->teacherRole->whereName('The Head Science Department')->first();
    }

    public function assistScienceDept()
    {
        return $this->teacherRole->whereName('The Assistant Head Science Department')->first();
    }
}