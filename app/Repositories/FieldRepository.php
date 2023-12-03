<?php

namespace App\Repositories;

use App\Interfaces\FieldInterface;
use App\Models\Field;

class FieldRepository implements FieldInterface
{
	protected $field;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Field $field)
    {
        $this->field = $field;
    }

    public function all()
    {
        return $this->field->eagerLoaded();
    }

    public function create(array $data)
    {
    	return $this->field->create($data);
    }

    public function getId($id)
    {
    	return $this->field->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->field->destroy($id);
    }
}