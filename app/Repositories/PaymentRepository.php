<?php

namespace App\Repositories;

use App\Interfaces\PaymentInterface;
use App\Models\Payment;

class PaymentRepository implements PaymentInterface
{
	protected $payment;
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    public function all()
    {
        return $this->payment->eagerLoaded()->get();
    }

    public function paginated()
    {
        return $this->payment->eagerLoaded()->paginate(50);
    }

    public function create(array $data)
    {
    	return $this->payment->create($data);
    }

    public function getId($id)
    {
    	return $this->payment->findOrFail($id);
    }

    public function update(array $data,$id)
    {
        $record = $this->getId($id);
    	return $record->update($data);
    }

    public function delete($id)
    {
    	return $this->payment->destroy($id);
    }
}