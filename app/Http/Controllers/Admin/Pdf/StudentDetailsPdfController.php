<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentDetailsPdfController extends Controller
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

    public function studentDetails(Request $request)
    {
        $studentId = $request->student_id;
        if(is_null($studentId)){
           flash()->error(ucwords('Ensure you select the student name first before you proceed'));
            return back()->withErrors('Ensure you select the student name first before you proceed'); 
        }
        $student = Student::whereId($studentId)->firstOrFail();
        if(is_null($student->image)){
            flash()->error(ucwords('Please upload the student photo first!!!'));
            return back()->withErrors('Please upload the student photo first!!!');
        }
        
        $school = Auth::user()->school;
        $title = 'Student Details';
        $date = date("l, F j, Y",strtotime(now()));
        $inquiries = ". More inquiries, contact"." ".Auth::user()->school->phone_no;
        $downloadTitle = $school->name." ".$title." for ".$student->user->full_name." as on: ".$date.$inquiries;
        $vv = collect($student->stream->subjects()->pluck('name'));
        $streamSubjects = $vv->toArray();

        $pdf = PDF::loadView('admin.pdf.student_details',['student'=>$student,'school'=>$school,'title'=>$title,'streamSubjects'=>$streamSubjects,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,50, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf',array("Attachment" => 0)); 
    }
}
