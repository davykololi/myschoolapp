<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Year;
use App\Models\Term;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Stream;
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentExamResultsChartPdfController extends Controller
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

        $title = $year->year." ".$term->name." ".$exam->name." ".'Results';
        $downloadTitle = $markName." ".$title;

        $mathematics = $mark->mathematics;
        $english = $mark->english;
        $kiswahili = $mark->kiswahili;


        $pdf = PDF::loadView('admin.pdf.student_results_chart',compact('name','marks','year','term','exam','stream','school','title','markName','examGrades','generalGrades','downloadTitle', 'mathematics','english','kiswahili'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a5','landscape');
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
        $response = Http::get('https://quickstart.io/chart', [
            'c' => [
                'type' => 'bar',
                'data'  => [
                    'labels' => []
                ]
            ]
        ])
    }
}
