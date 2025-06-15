<?php

namespace App\Repositories;

use App\Interfaces\PaymentSectionInterface;
use App\Models\PaymentSection;

class PaymentSectionRepository implements PaymentSectionInterface
{
	protected $paymentSection;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentSection $paymentSection)
    {
        $this->paymentSection = $paymentSection;
    }

    public function all()
    {
        return $this->paymentSection->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->paymentSection->eagerLoaded()->paginate(50);
    }

    public function create(array $data)
    {
    	return $this->paymentSection->create($data);
    }

    public function getId($id)
    {
    	return $this->paymentSection->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->paymentSection->destroy($id);
    }
}