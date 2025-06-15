<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Year;
use App\Models\Term;
use App\Models\Exam;
use App\Models\Stream;
use App\Models\Grade;
use App\Models\GeneralGrade;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamMarkSheetPdfController extends Controller
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

    public function streamMarkSheet(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $examId = $request->exam_id;
        $streamId = $request->stream_id;
        $passMark = $request->pass_mark;

        $marks = streamMarks($yearId,$termId,$examId,$streamId);

        if((is_null($yearId)) || (is_null($termId)) || (is_null($examId)) || (is_null($streamId)) || ($marks->isEmpty())){
            return back()->withError('Please ensure you have filled in all the required details!');
        } 

        $year = Year::where('id',$yearId)->firstOrFail();
        $term = Term::where('id',$termId)->firstOrFail();
        $exam = Exam::where('id',$examId)->firstOrFail();
        $stream = Stream::where('id',$streamId)->firstOrFail();
        $school = auth()->user()->school;

        $examGrades = Grade::where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->eagerLoaded()->get();
        $generalGrades = GeneralGrade::where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->eagerLoaded()->get();
        // Male students count
        $males = $stream->students()->where(['gender'=>'Male'])->count();
        // Female students count
        $females = $stream->students()->where(['gender'=>'Female'])->count();

        //Start of stream subjects mean scores calculations
        $maths = $marks->pluck('mathematics','name');
        $english = $marks->pluck('english','name');
        $kiswahili = $marks->pluck('kiswahili','name');
        $chemistry = $marks->pluck('chemistry','name');
        $biology = $marks->pluck('biology','name');
        $physics = $marks->pluck('physics','name');
        $cre = $marks->pluck('cre','name');
        $islam = $marks->pluck('islam','name');
        $historyAndGovernment = $marks->pluck('history_and_government','name');
        $geography = $marks->pluck('geography','name');
        $homeScience = $marks->pluck('home_science','name');
        $artAndDesign = $marks->pluck('art_and_design','name');
        $agriculture = $marks->pluck('agriculture','name');
        $businessStudies = $marks->pluck('business_studies','name');
        $computerStudies = $marks->pluck('computer_studies','name');
        $drawingAndDesign = $marks->pluck('drawing_and_design','name');
        $french = $marks->pluck('french','name');
        $german = $marks->pluck('german','name');
        $arabic = $marks->pluck('arabic','name');
        $signLanguage = $marks->pluck('sign_language','name');
        $music = $marks->pluck('music','name');
        $woodWork = $marks->pluck('wood_work','name');
        $metalWork = $marks->pluck('metal_work','name');
        $buildingConstruction = $marks->pluck('building_construction','name');
        $powerMechanics = $marks->pluck('power_mechanics','name');
        $electricity = $marks->pluck('electricity','name');
        $aviationTechnology = $marks->pluck('aviation_technology','name');
        //End of mean subjects mean score calculations

        //Start of ranking
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

        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $stream = Stream::where('id',$streamId)->first();
        $school = auth()->user()->school;
        $streamStudents = $stream->students()->with('school')->get();

        //Get the subjects assigned to the class the stream belongs
        $numberOfSubjectsPerStream = $stream->class->number_of_subjects_per_class;
        //Caliculate the stream exam miniscore
        $streamMiniscore = $marks->avg('student_minscore');//Average of stream minscore

        $title = $year->year." ".$term->name." ".$stream->name." ".$exam->name." ".'Results';
        $downloadTitle = $school->name." "."-"." ".$title;

        $data = [
            'marks' => $marks,
            'examGrades' => $examGrades,
            'generalGrades' => $generalGrades,
            'exam' => $exam,
            'stream' => $stream,
            'school' => $school,
            'year' => $year,
            'term' => $term,
            'title' => $title,
            'rankings' => $rankings,
            'passMark' => $passMark,
            'totals' => $totals,
            'maths' => $maths,
            'english' => $english,
            'kiswahili' => $kiswahili,
            'chemistry' => $chemistry,
            'biology' => $biology,
            'physics' => $physics,
            'cre' => $cre,
            'islam' => $islam,
            'historyAndGovernment' => $historyAndGovernment,
            'geography' => $geography,
            'homeScience' => $homeScience,
            'artAndDesign' => $artAndDesign,
            'agriculture' => $agriculture,
            'businessStudies' => $businessStudies,
            'computerStudies' => $computerStudies,
            'drawingAndDesign' => $drawingAndDesign,
            'french' => $french,
            'german' => $german,
            'arabic' => $arabic,
            'signLanguage' => $signLanguage,
            'music' => $music,
            'woodWork' => $woodWork,
            'metalWork' => $metalWork,
            'buildingConstruction' => $buildingConstruction,
            'powerMechanics' => $powerMechanics,
            'electricity' => $electricity,
            'aviationTechnology' => $aviationTechnology,
            'streamMiniscore' => $streamMiniscore,
            'streamStudents' => $streamStudents,
            'females' => $females,
            'males' => $males,
            'downloadTitle' => $downloadTitle,
        ];

        $pdf = PDF::loadView('admin.pdf.stream_marksheet',$data)->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a3','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        return $pdf->download($downloadTitle.'.pdf',array("Attachment" => 0));
    }
}
