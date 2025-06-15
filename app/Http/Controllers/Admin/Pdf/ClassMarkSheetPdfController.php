<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Year;
use App\Models\Term;
use App\Models\Exam;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\GeneralGrade;
use App\Events\ExamRecords;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use HiFolks\Statistics\Statistics;
use Illuminate\Support\Facades\Http;
use App\Charts\StudentsChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ClassMarkSheetPdfController extends Controller
{
    protected $studentExamsMiniScoresChart;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LarapexChart $studentExamsMiniScoresChart)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->studentExamsMiniScoresChart = $studentExamsMiniScoresChart;
    }

    public function classMarkSheet(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $examId = $request->exam_id;
        $classId = $request->class_id;
        $passMark = $request->pass_mark; 

        $marks= classMarks($yearId,$termId,$examId,$classId);

        if((is_null($yearId)) || (is_null($termId)) || (is_null($examId)) || (is_null($classId)) || $marks->isEmpty()){
            return back()->withErrors('Please ensure you have filled in all the required details!');
        }

        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $class = MyClass::where('id',$classId)->first();
        $stream = Stream::where('class_id',$classId)->first();
        $school = auth()->user()->school;

        $examGrades = Grade::with('class','year','term','subject','exam','teacher')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get();
        $generalGrades = GeneralGrade::with('class','year','term','exam')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get();
        // Male students count
        $males = $class->males();
        // Female students count
        $females = $class->females();

        //Start of general subjects mean scores calculations
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
        // End Marksheet Ranking
        $title = $year->year." ".$term->name." ".$class->name." ".$exam->name." ".'Results';
        $schoolMotto = $school->motto;
        $schoolTel = $school->phone_no;
        $downloadTitle = $school->name." "."-"." ".$title.". ".$schoolMotto.". More inquiries contact: "." ".$schoolTel;
        $classMinscore = $marks->avg('student_minscore');//Average of class minscore
        //Total Marks Frequencies
        $totalMarks = $marks->pluck('total','name');
        $x = $totalMarks->toArray();
        $totalMarksFrequencies = Statistics::make($x);

        // call the event
        event(new ExamRecords($yearId,$termId,$examId,$classId,$school,$marks));

        $subjectsMiniscoresChart = $this->subjectsMiniscoresChart($maths,$english,$kiswahili,$chemistry,$biology,$physics,$cre,$islam,$historyAndGovernment,$geography);

        $data = [
            'marks' => $marks,
            'examGrades' => $examGrades,
            'generalGrades' => $generalGrades,
            'exam' => $exam,
            'class' => $class,
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
            'classMinscore' => $classMinscore,
            'females' => $females,
            'males' => $males,
            'totalMarksFrequencies' => $totalMarksFrequencies,
            'downloadTitle' => $downloadTitle,
            'subjectsMiniscoresChart' => $subjectsMiniscoresChart,
        ];

        $pdf = PDF::loadView('admin.pdf.class_marksheet',$data)->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true,'isPhpEnabled'=>true,'isJavascriptEnabled'=>true])->setPaper('a3','landscape');
    
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->page_script('$pdf->set_opacity(.2, "Multiply");');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download(Str::slug($downloadTitle).'.pdf',array("Attachment" => 0));
    }

    public function generateChart()
    {

        $response = Http::get("https://quickchart.io/chart", [
            "c" => [
                "type" => "bar",
                "data" => [
                    "labels" => ['J', 'F', 'M', 'A', 'M'],
                    "datasets" => [
                        [
                            "label" => "Sales",
                            "data" => [120, 150, 180, 200, 170]
                        ]
                    ]
                ]
            ]
        ]);

        $charturl = $response->json('url');

        return $charturl;
    }

    public function subjectsMiniscoresChart($maths,$english,$kiswahili,$chemistry,$biology,$physics,$cre,$islam,$history,$geography) : \ArielMejiaDev\LarapexCharts\BarChart
    {
        
        return $this->studentExamsMiniScoresChart->barChart()
                                                ->setTitle("Subjects Miniscores")
                                                ->setLabels(["Mathematics","English","Kiswahili","Chemistry","Biology","Physics","CRE","Islam","History","Geography"])
                                                ->setDataset([$maths->avg(),$english->avg(),$kiswahili->avg(),$chemistry->avg(),$biology->avg(),$physics->avg(),$cre->avg(),$islam->avg(),$history->avg(),$geography->avg()]);
    }
}
