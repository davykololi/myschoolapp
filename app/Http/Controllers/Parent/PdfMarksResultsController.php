<?php

namespace App\Http\Controllers\Parent;

use Auth;
use PDF;
use App\Models\Student;
use App\Models\Year;
use App\Models\Term;
use App\Models\Stream;
use App\Models\MyClass;
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
        $this->middleware('auth');
        $this->middleware('role:parent');
        $this->middleware('parent-banned');
        $this->middleware('checktwofa');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function  childExamResults(Request $request)
    {
        $currentYear = date('Y');
        $year = Year::where('year',$currentYear)->first();
        $currentTerm = Term::where('status',1)->first();
        $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id])->first();

        $yearId = $year->id;
        $termId = $currentTerm->id;
        $examId = $currentExam->id;
        $streamId = $request->stream_id;
        $name = $request->child_name;

        $year = Year::whereId($yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $stream = Stream::where(['id'=>$streamId])->first();
        $class = MyClass::whereId($stream->class_id)->firstOrFail();
        $classId = $class->id;
        $school = auth()->user()->school;

        if(($yearId === null) || ($termId === null) || ($examId === null) || ($streamId === null) || ($exam->year->id != $yearId) || ($exam->term->id != $termId) || ($examId != $exam->id)){
            return back()->withErrors('It appears the resulst are not ready!');
        }

        $marks = classMarks($yearId,$termId,$examId,$classId);
        if($marks->isEmpty()){
            return back()->withErrors('Marks notyet populated!');
        }

        $mark = mark($yearId,$termId,$streamId,$name);
        $markName = $mark->name;

        //  Start of student's class ranking
        $totals = $marks->pluck('total','name');
        $standings = $totals->toArray();
        $rankings = array();
        arsort($standings);
        $rank = 1;
        $tie_rank = 0;
        $prev_score = -1;
        foreach($standings as $name => $score){
            if($score != $prev_score){
                //this score is not a tie
                $count = 0;
                $prev_score = $score;
                $rankings[$name] = array('score' => $score,'rank'=>$rank);
            } else {
                //this is a tie
                $prev_score = $score;
                $rank --;
                if($count++ == 0){
                    $tie_rank = $rank;
                }
                $rankings[$name] = array('score'=>$score,'rank'=>$tie_rank);
            }
            $rank++;
        }
        $rankings;
        // End of Student's class ranking

        //Exam Grades
        $examGrades = Grade::with('class','year','term','subject','exam','teacher')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        $generalGrades = GeneralGrade::with('class','year','term','exam')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();

        $title = $year->year." ".$term->name." ".$exam->name." ".'Results';
        $inquiries = ". For more inquiries, contact"." ".Auth::user()->school->phone_no;
        $downloadTitle = $school->name." ".$markName." ".$title.$inquiries;
        $pdf = PDF::loadView('parent.pdf.child_exam_results',compact('marks','year','term','exam','stream','class','school','title','name','markName','rankings','examGrades','generalGrades','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a5','landscape');
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
        
        return $pdf->download($downloadTitle.'.pdf',array("Attachment" => 0));
    }
}
