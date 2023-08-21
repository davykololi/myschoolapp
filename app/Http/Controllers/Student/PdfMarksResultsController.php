<?php

namespace App\Http\Controllers\Student;

use Auth;
use PDF;
use App\Models\Year;
use App\Models\Term;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfMarksResultsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
        $this->middleware('student2fa');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function  downloadResults(Request $request)
    {
        $currentYear = date('Y');
        $year = Year::where('year',$currentYear)->first();
        $currentTerm = Term::where('status',1)->first();
        $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id])->first();


        $yearId = $year->id;
        $termId = $currentTerm->id;
        $examId = $currentExam->id;
        $streamId = Auth::user()->stream->id;
        $name = Auth::user()->full_name;
        $marks = streamMarks($yearId,$termId,$examId,$streamId);

        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $stream = Stream::where(['id'=>$streamId])->first();
        $school = auth()->user()->school;

        if(($yearId === null) || ($termId === null) || ($examId === null) || ($streamId === null) || ($exam->year->id != $yearId) || ($exam->term->id != $termId) || ($examId != $exam->id) || ($marks->isEmpty())){
            return back()->withErrors('It appears the resulst are not ready!');
        }

        $mark = mark($yearId,$termId,$streamId,$name);
        $markName = $mark->name;
        //Exam Grades
        $examGrades = Grade::with('class','year','term','subject','exam','teacher')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        $generalGrades = GeneralGrade::with('class','year','term','exam')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();

        $title = $exam->name." ".'Results';
        $pdf = PDF::loadView('student.pdf.student_results',compact('marks','year','term','exam','stream','school','title','markName','examGrades','generalGrades'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a5','landscape');
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
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf',array("Attachment" => 0));
    }
}
