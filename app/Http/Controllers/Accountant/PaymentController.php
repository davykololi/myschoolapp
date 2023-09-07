<?php

namespace App\Http\Controllers\Accountant;

use App\Services\PaymentService;
use App\Services\YearService;
use App\Services\TermService;
use App\Services\ClassService;
use App\Services\StreamService;
use App\Services\StudentService;
use App\Models\PaymentRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\CreateFormRequest;
use App\Http\Requests\Payment\UpdateFormRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentService, $studentService, $yearService, $termService, $classService, $streamService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentService $paymentService,StudentService $studentService,YearService $yearService,TermService $termService,ClassService $classService,StreamService $streamService)
    {
        $this->middleware('auth:accountant');
        $this->middleware('banned');
        $this->middleware('accountant2fa');
        $this->studentService = $studentService;
        $this->paymentService = $paymentService;
        $this->yearService = $yearService;
        $this->termService = $termService;
        $this->classService = $classService;
        $this->streamService = $streamService;
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
        $students = $this->studentService->all();
        $years = $this->yearService->all();
        $terms = $this->termService->all();
        $classes = $this->classService->all();
        $streams = $this->streamService->all();

        return view('accountant.payments.create',compact('students','years','terms','classes','streams'));
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
        $payment = $this->paymentService->create($request);

        return back()->withSuccess(ucwords($payment->title." ".'info created successfully'));
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
        $payment = $this->paymentService->getId($id);

        return view('accountant.payments.show',compact('payment'));
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
        $payment = $this->paymentService->getId($id);
        $students = $this->studentService->all();
        $years = $this->yearService->all();
        $terms = $this->termService->all();
        $classes = $this->classService->all();
        $streams = $this->streamService->all();

        return view('accountant.payments.edit',compact('payment','students','years','terms','classes','streams'));
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
        $payment = $this->paymentService->getId($id);
        if($payment){
            $this->paymentService->update($request,$id);

            return redirect()->route('accountant.payments.index')->withSuccess(ucwords($payment->title." ".'info updated successfully'));
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
        $payment = $this->paymentService->getId($id);
        if($payment){
            $this->paymentService->delete($id);

            return back()->withSuccess(ucwords($payment->title." ".'info deleted successfully'));
        }
    }
}
