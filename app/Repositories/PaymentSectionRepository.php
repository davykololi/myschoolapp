<?php

namespace App\Repositories;

use App\Interfaces\PaymentSectionInterface;
use App\Models\PaymentSection;

class PaymentSectionRepository implements PaymentSectionInterface
{
	protected $PaymentSection;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentSection $PaymentSection)
    {
        $this->PaymentSection = $PaymentSection;
    }

    public function all()
    {
        return $this->PaymentSection->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->PaymentSection->eagerLoaded()->paginate(50);
    }

    public function create(array $data)
    {
    	return $this->PaymentSection->create($data);
    }

    public function getId($id)
    {
    	return $this->PaymentSection->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->PaymentSection->destroy($id);
    }
}