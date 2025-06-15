<?php

namespace App\Http\Controllers\Accountant;

use Auth;
use Storage;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Support\Str;
use App\Traits\FilesUploadTrait;
use App\Models\PaymentRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PaymentRecord\CreateFormRequest;
use App\Http\Requests\PaymentRecord\UpdateFormRequest;


class PaymentRecordController extends Controller
{
    use FilesUploadTrait;
    protected $studentService;

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService)
    {
        $this->middleware('auth');
        $this->middleware('role:accountant');
        $this->middleware('accountant-banned');
        $this->middleware('checktwofa');
        $this->studentService = $studentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormRequest $request)
    {
        //
        $barcode = rand(1000000000,9999999999);
        $paymentRefNo = $request->payment_ref_no;
        $originalRefCode = $request->payment_ref_code;
        $input = $request->validated();
        $input['balance'] = $request->payment_balance - $request->amount_paid;
        $input['verified'] = 1;
        $input['ref_no'] = 'PR/'.$paymentRefNo."/".$originalRefCode."/".date("Y");
        $input['barcode'] = $barcode;
        $input['student_id'] = $request->student_id;
        $input['payment_id'] = $request->payment_id;
        $input['payment_section_id'] = $request->payment_section_id;
        $input['accountant_id'] = Auth::user()->accountant->id;
        $paymentRecord = PaymentRecord::create($input);
        $student = Student::whereId($input['student_id'])->first();

        return redirect('accountant/student-profile'."?"."student_id"."=".$student->id)->withSuccess('payment updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $paymentRecord = PaymentRecord::findOrFail($id);
        if(!$paymentRecord){
            return back()->withErrors('Oops! There was an error in deleting the payment record. Try again!');
        }
        $paymentRecord->delete();

        return back()->withSuccess('The payment record deleted successfully');
    }
}
