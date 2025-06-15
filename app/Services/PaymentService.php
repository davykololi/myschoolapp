<?php

namespace App\Services;

use Auth;
use App\Models\Student;
use App\Models\Stream;
use App\Models\MyClass;
use App\Models\School;
use App\Models\PaymentSection;
use App\Repositories\PaymentRepository as PaymentRepo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
		$studentId = $request->student_id;
		$streamId = $request->stream_id;
		$classId = $request->class_id;
		$schoolId = Auth::user()->school->id;

		if($studentId){
			$student = Student::whereId($studentId)->first();
			$data = $request->validated();
			$data['payment_section_id'] = $request->payment_section;
			$paymentSection = PaymentSection::where('id',$data['payment_section_id'])->first();
			$data['amount'] = $paymentSection->payment_amount;
			$data['ref_no'] = $paymentSection->ref_no;
			$data['description'] = $paymentSection->description;
        	$data['student_id'] = $student->id;
        	$data['year_id'] = $request->year_id;
        	$data['school_id'] = Auth::user()->school->id;

        	return $data;
    	}

    	if($streamId){
    		$stream = Stream::whereId($streamId)->first();
    		$streamStudents = $stream->students;

    		foreach($streamStudents as $student){
				$data = $request->validated();
				$data['payment_section_id'] = $request->payment_section;
				$paymentSection = PaymentSection::where('id',$data['payment_section_id'])->first();
				$data['amount'] = $paymentSection->payment_amount;
				$data['ref_no'] = $paymentSection->ref_no;
				$data['description'] = $paymentSection->description;
        		$data['student_id'] = $student->id;
        		$data['year_id'] = $request->year_id;
        		$data['school_id'] = Auth::user()->school->id;

        		return $data;
        	}
    	}

    	if($classId){
    		$class = MyClass::whereId($classId)->first();
    		$classStudents = $class->students;

    		foreach($classStudents as $student){
				$data = $request->validated();
				$data['payment_section_id'] = $request->payment_section;
				$paymentSection = PaymentSection::where('id',$data['payment_section_id'])->first();
				$data['amount'] = $paymentSection->payment_amount;
				$data['ref_no'] = $paymentSection->ref_no;
				$data['description'] = $paymentSection->description;
        		$data['student_id'] = $student->id;
        		$data['year_id'] = $request->year_id;
        		$data['school_id'] = Auth::user()->school->id;

        		return $data;
        	}
    	}

    	if($schoolId){
    		$school = School::whereId($schoolId)->first();
    		$schoolStudents = $school->students;

    		foreach($schoolStudents as $student){
				$data = $request->validated();
				$data['payment_section_id'] = $request->payment_section;
				$paymentSection = PaymentSection::where('id',$data['payment_section_id'])->first();
				$data['amount'] = $paymentSection->payment_amount;
				$data['ref_no'] = $paymentSection->ref_no;
				$data['description'] = $paymentSection->description;
        		$data['student_id'] = $student->id;
        		$data['year_id'] = $request->year_id;
        		$data['school_id'] = Auth::user()->school->id;

        		return $data;
        	}
    	}
	}

	public function updateData(UpdateFormRequest $request)
	{
		$studentId = $request->student_id;
		$streamId = $request->stream_id;
		$classId = $request->class_id;

		if($studentId){
			$student = Student::whereId($studentId)->first();
			$data = $request->validated();
			$data['payment_section_id'] = $request->payment_section;
			$paymentSection = PaymentSection::where('id',$data['payment_section_id'])->first();
			$data['amount'] = $paymentSection->payment_amount;
			$data['ref_no'] = $paymentSection->ref_no;
			$data['description'] = $paymentSection->description;
        	$data['student_id'] = $student->id;
        	$data['year_id'] = $request->year_id;
        	$data['school_id'] = Auth::user()->school->id;

        	return $data;
    	}

    	if($streamId){
    		$stream = Stream::whereId($streamId)->first();
    		$streamStudents = $stream->students;

    		foreach($streamStudents as $student){
				$data = $request->validated();
				$data['payment_section_id'] = $request->payment_section;
				$paymentSection = PaymentSection::where('id',$data['payment_section_id'])->first();
				$data['amount'] = $paymentSection->payment_amount;
				$data['ref_no'] = $paymentSection->ref_no;
				$data['description'] = $paymentSection->description;
        		$data['student_id'] = $student->id;
        		$data['year_id'] = $request->year_id;
        		$data['school_id'] = Auth::user()->school->id;

        		return $data;
        	}
    	}

    	if($classId){
    		$class = MyClass::whereId($classId)->first();
    		$classStudents = $class->students;

    		foreach($classStudents as $student){
				$data = $request->validated();
				$data['payment_section_id'] = $request->payment_section;
				$paymentSection = PaymentSection::where('id',$data['payment_section_id'])->first();
				$data['amount'] = $paymentSection->payment_amount;
				$data['ref_no'] = $paymentSection->ref_no;
				$data['description'] = $paymentSection->description;
        		$data['student_id'] = $student->id;
        		$data['year_id'] = $request->year_id;
        		$data['school_id'] = Auth::user()->school->id;

        		return $data;
        	}
    	}
	}

	public function delete($id)
	{
		return $this->paymentRepo->delete($id);
	}
}