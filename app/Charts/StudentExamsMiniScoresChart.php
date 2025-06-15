<?php

namespace App\Charts;

use Auth;
use App\Models\Exam;
use App\Models\Mark;
use Chart;

class StudentExamsMiniScoresChart
{
    protected $studentExamsMiniScoresChart;

    public function __construct(Chart $studentExamsMiniScoresChart)
    {
        $this->studentExamsMiniScoresChart = $studentExamsMiniScoresChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $marks = Mark::with('exam','class')->where(['admission_no'=>auth()->user()->student->admission_no,'name'=>auth()->user()->full_name])->get();
        $miniscores = $marks->map(function($mark,$key){
            return $mark['student_minscore'];
        });

        $exams = $marks->map(function($mark,$key){
            return $mark->exam->name;
        });

        return $this->studentExamsMiniScoresChart->barChart()
            ->setTitle('Exams Performance Miniscores Bar Chart.')
            ->setSubtitle('The chart showing the minicore I scored in each exam.')
            ->addData("Miniscore", ($miniscores->all()))
            ->setXAxis($exams->all())
            ->setColors(["#ffc63b","#ff6384"])
            ->setFontFamily("DM Sans")
            ->setMarkers(["#FF5722","#E040FB",7,10])
            ->setGrid('#3F51b5',0.1);
    }
}
