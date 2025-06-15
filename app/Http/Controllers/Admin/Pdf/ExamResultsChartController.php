<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use App\Models\Year;
use App\Models\Term;
use App\Models\Exam;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Events\ExamRecords;
use Illuminate\Support\Str;
use App\Services\YearService;
use App\Services\TermService;
use App\Services\ExamService;
use App\Services\ClassService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use HiFolks\Statistics\Statistics;
use Illuminate\Support\Facades\Http;
use mikehaertl\wkhtmlto\Pdf as PDF;

class ExamResultsChartController extends Controller
{
    protected $yearService, $termService, $examService, $classService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(YearService $yearService, TermService $termService, ExamService $examService, ClassService $classService,)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->yearService = $yearService;
        $this->termService = $termService;
        $this->examService = $examService;
        $this->classService = $classService;
    }

    public function examResultsChart()
    {
        $years = $this->yearService->all();
        $terms = $this->termService->all();
        $classes = $this->classService->all();
        $exams = $this->examService->all();

        return view('admin.pdf.exam_results_chart_form',compact('years','terms','classes','exams'));
    }

    public function classExamResultsChart(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $examId = $request->exam_id;
        $classId = $request->class_id;
        $passMark = $request->pass_mark;

        if((is_null($yearId)) || (is_null($termId)) || (is_null($examId)) || (is_null($classId))){
            return back()->withErrors('Please ensure you have filled in all the required details!');
        } 

        $marks= classMarks($yearId,$termId,$examId,$classId);
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
        $history = $marks->pluck('history','name');
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
        $title = $year->year." ".$term->name." ".$class->name." ".$exam->name." ".'Results Chart';
        $downloadTitle = $school->name." "."-"." ".$title;
        $classMinscore = $marks->avg('student_minscore');//Average of class minscore
        //Total Marks Frequencies
        $totalMarks = $marks->pluck('total','name');
        $x = $totalMarks->toArray();
        $totalMarksFrequencies = Statistics::make($x);

        // call the event
        event(new ExamRecords($yearId,$termId,$examId,$classId,$school,$marks));

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
            'history' => $history,
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
            'downloadTitle' => $downloadTitle,
        ];

        $render = view('admin.pdf.exam_results_chart',$data)->render();

        $pdf = new PDF;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        $pdf->saveAs(public_path($class->name.".pdf"));

        return response()->download(public_path($class->name.".pdf"));
    }
}
