<?php

namespace App\Services;

use App\Repositories\PaymentSectionRepository;
use Illuminate\Support\Str;
use App\Http\Requests\PaymentSectionFormRequest as StoreRequest;
use App\Http\Requests\PaymentSectionFormRequest as UpdateRequest;

class PaymentSectionService
{
    protected $paymentSectionRepo;

    public function __construct(PaymentSectionRepository $paymentSectionRepo)
    {
        $this->paymentSectionRepo = $paymentSectionRepo;
    }

    public function all()
    {
        return $this->paymentSectionRepo->all();
    }

    public function paginated()
    {
        return $this->paymentSectionRepo->paginated();
    }

    public function create(StoreRequest $request)
    {
        $data = $this->createData($request);

        return $this->paymentSectionRepo->create($data);
    }

    public function update(UpdateRequest $request,$id)
    {
        $data = $this->updateData($request);

        return $this->paymentSectionRepo->update($data,$id);
    }

    public function getId($id)
    {
        return $this->paymentSectionRepo->getId($id);
    }

    public function createData(StoreRequest $request)
    {
        $data = $request->validated();
        $data['school_id'] = auth()->user()->school->id;

        return $data;
    }

    public function updateData(UpdateRequest $request)
    {
        $data = $request->only('name','description','payment_amount','ref_no','reciept_footer_info');
        $data['school_id'] = auth()->user()->school->id;

        return $data;
    }

    public function delete($id)
    {
        return $this->paymentSectionRepo->delete($id);
    }
}