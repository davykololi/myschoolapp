<?php

namespace App\Charts;

use Auth;
use PDF;
use App\Models\Year;
use App\Models\Term;
use App\Models\Stream;
use App\Models\MyClass;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Models\Mark;
use Chart;

class StudentExamSubjectsResultsChart
{
    protected $studentExamSubjectsResultsChart;

    public function __construct(Chart $studentExamSubjectsResultsChart)
    {
        $this->studentExamSubjectsResultsChart = $studentExamSubjectsResultsChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $currentYear = date('Y');
        $year = Year::where('year',$currentYear)->first();
        $currentTerm = Term::where('status',1)->first();
        $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id])->first();

        $yearId = $year->id;
        $termId = $currentTerm->id;
        $examId = $currentExam->id;
        $streamId = Auth::user()->student->stream->id;
        $name = Auth::user()->full_name;

        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $stream = Stream::where(['id'=>$streamId])->first();
        $class = MyClass::whereId($stream->class_id)->firstOrFail();
        $classId = $class->id;
        $school = auth()->user()->school;

        $marks = classMarks($yearId,$termId,$examId,$classId);
        $mark = examMark($yearId,$termId,$streamId,$examId,$name);
        $examName = $mark->exam->name;

        $maths = $mark->mathematics;
        $english = $mark->english;
        $kiswahili = $mark->kiswahili;
        $biology = $mark->biology ?? "";
        $chemistry = $mark->chemistry ?? "";
        $physics = $mark->physics ?? "";
        $cre = $mark->cre ?? "";
        $islam = $mark->islam ?? "";
        $historyAndGovernment = $mark->history_and_government ?? "";
        $geog = $mark->geography ?? "";
        $artAndDesign = $mark->art_and_design ?? "";
        $agriculture = $mark->agriculture ?? "";
        $businessStudies = $mark->business_studies ?? "";
        $computerStudies = $mark->computer_studies ?? "";
        $french = $mark->french ?? "";

        $bioSub = $mark->biology ?  "BIO" : "";
        $chemSub = $mark->chemistry ?  "CHEM" : "";
        $phySub = $mark->physics ?  "PHY" : "";
        $creSub = $mark->cre ? "CRE" : "";
        $islamSub = $mark->islam ? "ISLM" : "";
        $histAndGovSub = $mark->history_and_government ? "H&GOV" : "";
        $geogSub = $mark->geography ? "GEOG" : "";

        $artAndDesignSub = $mark->art_and_design ? "A&D" : "";
        $agricultureSub = $mark->agriculture ? "AGRIC" : "";
        $businessStudiesSub = $mark->business_studies ? "B/S" : "";
        $computerStudiesSub = $mark->computer_studies ? "COMP/S" : "";
        $frenchSub = $mark->french ? "FRENCH" : "";

        return $this->studentExamSubjectsResultsChart->barChart()
            ->setTitle($examName." "."Results Perfomance Bar Chart %")
            ->setSubtitle('How I perfomed in every subject bar chart.')
            ->addData('Score in %', [$maths,$english,$kiswahili,$biology,$chemistry,$physics,$cre,$islam,$historyAndGovernment,$geog,$artAndDesign,$agriculture,$businessStudies,$computerStudies,$french])
            ->setXAxis(['MATHS', 'ENG', 'KIS', $bioSub, $chemSub, $phySub, $creSub, $islamSub,$histAndGovSub,$geogSub,$artAndDesignSub,$agricultureSub,$businessStudiesSub,$computerStudiesSub,$frenchSub])
            ->setGrid('#3F51b5',0.1);   
    }
}
