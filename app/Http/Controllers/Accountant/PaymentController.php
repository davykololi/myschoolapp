<?php

namespace App\Http\Controllers\Accountant;

use Auth;
use App\Services\PaymentService;
use App\Services\YearService;
use App\Services\TermService;
use App\Services\ClassService;
use App\Services\StreamService;
use App\Services\StudentService;
use App\Services\PaymentSectionService;
use App\Models\PaymentRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\CreateFormRequest;
use App\Http\Requests\Payment\UpdateFormRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentSectionService ,$paymentService, $studentService, $yearService, $termService, $classService, $streamService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentSectionService $paymentSectionService,PaymentService $paymentService,StudentService $studentService,YearService $yearService,TermService $termService,ClassService $classService,StreamService $streamService)
    {
        $this->middleware('auth');
        $this->middleware('role:accountant');
        $this->middleware('accountant-banned');
        $this->middleware('checktwofa');
        $this->studentService = $studentService;
        $this->paymentService = $paymentService;
        $this->paymentSectionService = $paymentSectionService;
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
        $user = Auth::user();
        if(Auth::check() && $user->hasRole('accountant')){
            $payment = $this->paymentService->create($request);
            if($payment){
                $terms = $request->terms;
                $payment->terms()->sync($terms);

                return back()->withSuccess('Done successfully');
            }
        }
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
        $user = Auth::user();
        if(Auth::check() && $user->hasRole('accountant')){
            $payment = $this->paymentService->getId($id);
            $students = $this->studentService->all();
            $years = $this->yearService->all();
            $terms = $this->termService->all();
            $classes = $this->classService->all();
            $streams = $this->streamService->all();
            $paymentSections = $this->paymentSectionService->all();

            return view('accountant.payments.edit',compact('payment','students','years','terms','classes','streams','paymentSections'));  
        }
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
        $user = Auth::user();
        if(Auth::check() && $user->hasRole('accountant')){
            $payment = $this->paymentService->getId($id);
            if($payment){
                $this->paymentService->update($request,$id);
                $terms = $request->terms;
                $payment->terms()->sync($terms);

                return redirect()->route('accountant.student.profile')->withSuccess(ucwords($payment->title." ".'info updated successfully'));
            }
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
        $user = Auth::user();
        if(Auth::check() && $user->hasRole('accountant')){
            $payment = $this->paymentService->getId($id);
            if($payment){
                $this->paymentService->delete($id);
                $payment->terms()->detach();

                return back()->withSuccess(ucwords($payment->title." ".'info deleted successfully'));
            }
        } 
    }
}
