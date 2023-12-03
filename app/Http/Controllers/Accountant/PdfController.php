<?php

namespace App\Http\Controllers\Accountant;

use PDF;
use Carbon\Carbon;
use App\Models\School;
use App\Models\Payment;
use App\Models\MyClass;
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
        $this->middleware('banned');
        $this->middleware('accountant2fa');
    }

    public function paymentReceipt(PaymentRecord $paymentRecord)
    {
        if(is_null($paymentRecord)){
            return back()->withErrors('No Payment Record!');
        }

        $school = auth()->user()->school;
        $student = $paymentRecord->student->full_name;
    	$title = "Fee Payment Receipt";
        $downloadTile = $student." ".$paymentRecord->payment->title." "."Receipt";
    	$pdf = PDF::loadView('accountant.pdf.student_receipt',['paymentRecord'=>$paymentRecord,'school'=>$school,'title'=>$title,'student'=>$student])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','portrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/2);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper('Student Payment Receipt'),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTile.'.pdf');
    }

    public function streamFeeBalances(Request $request)
    {
        $streamId = $request->stream;
        
        if(is_null($streamId)){
            return back()->withErrors('Please select the stream first!');
        }

        $stream = Stream::where('id',$streamId)->first();
        $streamStudents = streamStudents($stream);

        if($streamStudents->isEmpty()){
            return back()->withErrors('Students notyet assigned to'." ".$stream->name);
        }

        $streamTotalBalance = streamTotalBalance($stream);
        $school = auth()->user()->school;
        $title = $stream->name." "."Fee Balances";
        $downloadTile = $school->name." ".$stream->name." "."Fee Balances";
        $pdf = PDF::loadView('accountant.pdf.stream_fee_balances',['stream'=>$stream,'streamStudents'=>$streamStudents,'streamTotalBalance'=>$streamTotalBalance,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','portrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTile.'.pdf');
    }

    public function classFeeBalances(Request $request)
    {
        $classId = $request->class;
        
        if(is_null($classId)){
            return back()->withErrors('Please select the class first!');
        }

        $class = MyClass::where('id',$classId)->first();
        $classStudents = classStudents($class);

        if($classStudents->isEmpty()){
            return back()->withErrors('Students notyet assigned to'." ".$class->name);
        }

        $classTotalBalance = classTotalBalance($class);
        $school = auth()->user()->school;
        $title = $class->name." "."Fee Balances";
        $downloadTile = $school->name." ".$class->name." "."Fee Balances";
        $pdf = PDF::loadView('accountant.pdf.class_fee_balances',['class'=>$class,'classStudents'=>$classStudents,'classTotalBalance'=>$classTotalBalance,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','portrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTile.'.pdf');
    }

    public function studentPaymentStatement(Request $request)
    {
        $studentId = $request->student;
        if(is_null($studentId)){
            return back()->withErrors('Please select student first!');
        }

        $student = Student::where('id',$studentId)->first();
        $studentPayments = $student->payments()->with('payment_records','student','year','term')->get();
        
        if(($student->payment_records->isEmpty() || $student->payments->isEmpty())){
            return back()->withErrors('This student has no payment records at all !');
        }
        $school = auth()->user()->school;
        $title = $student->full_name." "."Fee Payment Statement";
        $pdf = PDF::loadView('accountant.pdf.student_payment_statement',['student'=>$student,'studentPayments'=>$studentPayments,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper("Student Payment Statement"),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function paymentsByRefNo(Request $request)
    {
        $paymentRefNo = $request->payment_ref_no;
        if(is_null($paymentRefNo)){
            return back()->withErrors('Please provide the payment reference number first!');
        }

        $payments = Payment::where('ref_no',$paymentRefNo)->with('student')->get();
        if($payments->isEmpty()){
            return back()->withErrors('No payments with the provided reference number found!');
        }
        
        $school = auth()->user()->school;
        $title = $paymentRefNo." "."Payment List";
        $downloadTile = $school->name." ".$title;
        $pdf = PDF::loadView('accountant.pdf.payments_by_refno',['payments'=>$payments,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','portrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTile.'.pdf');
    }
}
