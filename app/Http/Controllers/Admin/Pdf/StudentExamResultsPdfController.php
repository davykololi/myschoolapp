<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Year;
use App\Models\Term;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Stream;
use App\Models\MyClass;
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentExamResultsPdfController extends Controller
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
    
    public function  studentExamResults(Request $request)
    {
        $currentYear = date('Y');
        $year = Year::where('year',$currentYear)->first();
        $currentTerm = Term::where('status',1)->first();
        $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id])->first();
        $yearId = $year->id;
        $termId = $currentTerm->id;
        $examId = $currentExam->id;

        $studentId = $request->student_id;
        if(is_null($studentId)){
            return back()->withErrors('Select the student name first before you proceed');
        }

        $student = Student::whereId($studentId)->firstOrFail();
        $streamId = $student->stream->id;
        $name = $student->user->full_name;

        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $stream = Stream::where(['id'=>$streamId])->first();
        $class = MyClass::whereId($stream->class_id)->firstOrFail();
        $classId = $class->id;
        $school = auth()->user()->school;
        $marks = classMarks($yearId,$termId,$examId,$classId);

        if(($yearId === null) || ($termId === null) || ($examId === null) || ($streamId === null) || ($exam->year->id != $yearId) || ($exam->term->id != $termId) || ($examId != $exam->id) || ($marks->isEmpty())){
            return back()->withErrors('It appears the resulst are not ready!');
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

        $title = $year->year." ".$term->name." ".$exam->name." ".'Result Slip';
        $moreInquiries = ". For more inquiries, contact ".Auth::user()->school->phone_no;
        $downloadTitle = Auth::user()->school->name.". ".$markName." ".$title.$moreInquiries;

        $pdf = PDF::loadView('admin.pdf.student_results',compact('name','marks','year','term','exam','stream','class','school','title','markName','rankings','examGrades','generalGrades','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','portrait');
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
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf',array("Attachment" => 0));
    }

    public function generateChart()
    {
        $response = Http::get('https://quickchart.io/chart', [
            'c' => [
                'type' => 'bar',
                'data'  => [
                    'labels' => [
                        'January','February','March','May','June','July','August','September','October','November','December'
                    ],
                    'datasets' => [
                        'labels' => 'Sales',
                        'data' => 120, 148, 150, 100, 145, 156, 134, 189, 175, 164, 123, 133,
                    ]
                ]
            ]
        ]);
    }
}
