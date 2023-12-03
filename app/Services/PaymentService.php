<?php

namespace App\Services;

use Auth;
use App\Repositories\PaymentRepository as PaymentRepo;
use Illuminate\Support\Str;
use App\Http\Requests\Payment\CreateFormRequest;
use App\Http\Requests\Payment\UpdateFormRequest;

class PaymentService
{
	protected $paymentRepo;

	public function __construct(PaymentRepo $paymentRepo)
	{
		$this->paymentRepo = $paymentRepo;
	}

	public function all()
	{
		return $this->paymentRepo->all();
	}

	public function paginated()
	{
		return $this->paymentRepo->paginated();
	}

	public function create(CreateFormRequest $request)
	{
		$data = $this->createData($request);

		return $this->paymentRepo->create($data);
	}

	public function update(UpdateFormRequest $request,$id)
	{
		$data = $this->updateData($request);

		return $this->paymentRepo->update($data,$id);
	}

	public function getId($id)
	{
		return $this->paymentRepo->getId($id);
	}

	public function createData(CreateFormRequest $request)
	{
		$data = $request->validated();
        $data['student_id'] = $request->student;
        $data['year_id'] = $request->year;
        $data['term_id'] = $request->term;
        $data['school_id'] = Auth::user()->school->id;

        return $data;
	}

	public function updateData(UpdateFormRequest $request)
	{
		$data = $request->only(['title','description','amount','ref_no']);
        $data['student_id'] = $request->student;
        $data['year_id'] = $request->year;
        $data['term_id'] = $request->term;
        $data['school_id'] = Auth::user()->school->id;

        return $data;
	}

	public function delete($id)
	{
		return $this->paymentRepo->delete($id);
	}
}