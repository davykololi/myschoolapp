<?php

namespace App\Http\Controllers\Admin\Pdf;

use PDF;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsAllocatedToPaymentSectionPdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }

    public function studentsOnpaymentSection(Request $request)
    {
        $paymentSectionRefNo = $request->payment_section_ref_no;
        if(is_null($paymentSectionRefNo)){
            return back()->withErrors('Please provide the payment reference number first!');
        }

        $payments = Payment::where('ref_no',$paymentSectionRefNo)->with('student.user')->get();
        if($payments->isEmpty()){
            return back()->withErrors('No payments with the provided reference number found!');
        }

        $totalSum = paymentByRefNumberTotalSum($payments);
        $school = auth()->user()->school;
        $title = $paymentSectionRefNo." "."Payment List";
        $downloadTitle = $school->name." "."-"." ".$title;
        $pdf = PDF::loadView('admin.pdf.payments_by_refno',['payments'=>$payments,'school'=>$school,'title'=>$title,'downloadTitle'=>$downloadTitle,'totalSum'=>$totalSum])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
