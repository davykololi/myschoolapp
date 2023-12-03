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
        $this->middleware('auth:accountant');
        $this->middleware('banned');
        $this->middleware('accountant2fa');
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
        $randomnNo = mt_rand(10000, 999999);
        $paymentRefNo = $request->payment_ref_no;
        $input = $request->validated();
        $input['balance'] = $request->payment_balance - $request->amount_paid;
        $input['verified'] = 1;
        $input['ref_no'] = 'PR/'.$randomnNo."/".$paymentRefNo;
        $input['student_id'] = $request->student_id;
        $input['payment_id'] = $request->payment_id;
        $input['accountant_id'] = Auth::user()->id;
        $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
        PaymentRecord::create($input);

        return redirect()->route('accountant.student.profile')->withSuccess('payment updated successfully');
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
        $paymentRecord = PaymentRecord::findOrFail($id);

        return view('accountant.paymentrecords.show',compact('paymentRecord'));
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
        $paymentRecord = PaymentRecord::with('payment','student')->findOrFail($id);

        return view('accountant.paymentrecords.edit',compact('paymentRecord'));
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
        $paymentRecord = PaymentRecord::with('payment','student')->findOrFail($id);
        if($paymentRecord){
            Storage::delete('public/files/'.$paymentRecord->file);
            $input = $request->validated();
            $input['verified'] = 1;
            $input['student_id'] = $request->student_id;
            $input['payment_id'] = $paymentRecord->payment->id;
            $input['accountant_id'] = Auth::user()->id;
            $input['file'] = $this->verifyAndUpload($request,'file','public/files/');
            $paymentRecord->update($input);

            return redirect('/accountant/student-profile')->withSuccess('payment updated successfully');
        }  
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
