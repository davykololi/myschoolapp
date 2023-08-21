<?php

namespace App\Http\Controllers\Accountant;

use PDF;
use Carbon\Carbon;
use App\Models\School;
use App\Models\Payment;
use App\Models\Stream;
use App\Models\Student;
use App\Models\PaymentRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:accountant');
        $this->middleware('accountant2fa');
    }

    public function paymentReceipt(PaymentRecord $paymentRecord)
    {
        if(is_null($paymentRecord)){
            return back()->withErrors('No Payment Record!');
        }

        $school = auth()->user()->school;
        $student = $paymentRecord->student->full_name;
    	$title = $student." ".'Payment Receipt for'." "."Kshs:".number_format($paymentRecord->amount_paid,2);
    	$pdf = PDF::loadView('accountant.pdf.student_receipt',['paymentRecord'=>$paymentRecord,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a5','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper('Student Payment Receipt'),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function feeBalances(Request $request)
    {
        $streamId = $request->stream;
        
        if(is_null($streamId)){
            return back()->withErrors('Please select stream first!');
        }

        $stream = Stream::where('id',$streamId)->first();
        $streamStudents = $stream->students()->with('payments','payment_records')->get();
        $school = auth()->user()->school;
        $title = $stream->name." "."Fee Balances";
        $pdf = PDF::loadView('accountant.pdf.fee_balances',['stream'=>$stream,'streamStudents'=>$streamStudents,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','portrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function studentPaymentDetails(Request $request)
    {
        $studentId = $request->student;
        
        if(is_null($studentId)){
            return back()->withErrors('Please select student first!');
        }

        $student = Student::where('id',$studentId)->first();
        $studentPayments = $student->payments()->with('payment_records','student','year','term')->get();
        
        if(empty($student->payment_records)){
            return back()->withErrors('No Payment Records At All');
        }
        $school = auth()->user()->school;
        $title = $student->full_name." "."Fee Payment Statement";
        $pdf = PDF::loadView('accountant.pdf.student_payment_details',['student'=>$student,'studentPayments'=>$studentPayments,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper("Student Payment Statement"),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }
}
