<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PaymentSectionService;
use App\Http\Requests\PaymentSectionFormRequest as StoreRequest;
use App\Http\Requests\PaymentSectionFormRequest as UpdateRequest;

class PaymentSectionController extends Controller
{
    protected $paymentSectionService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentSectionService $paymentSectionService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->paymentSectionService = $paymentSectionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $paymentSections = $this->paymentSectionService->all();

        return view('admin.payment-sections.index',compact('paymentSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.payment-sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $paymentSection = $this->paymentSectionService->create($request);

        return redirect()->route('admin.payment-sections.index')->withSuccess(ucwords($paymentSection->name." ".'info created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $paymentSection = $this->paymentSectionService->getId($id);
        $paymentSectionDepartments = $paymentSection->payments()->with('payment_section')->get();

        return view('admin.payment-sections.show',compact('paymentSection','paymentSectionDepartments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $paymentSection = $this->paymentSectionService->getId($id);

        return view('admin.payment-sections.edit',compact('paymentSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $paymentSection = $this->paymentSectionService->getId($id);
        if($paymentSection){
            $this->paymentSectionService->update($request,$id);

            return redirect()->route('admin.payment-sections.index')->withSuccess(ucwords($paymentSection->name." ".'info updated successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $paymentSection = $this->paymentSectionService->getId($id);
        if($paymentSection){
            $this->paymentSectionService->delete($id);

            return redirect()->route('admin.payment-sections.index')->withSuccess(ucwords($paymentSection->name." ".'deleted successfully'));
        }
    }
}
