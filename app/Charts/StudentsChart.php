<?php

namespace App\Charts;

use Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class StudentsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $females = Auth::user()->school->students()->where('gender','Female')->count();
        $males = Auth::user()->school->students()->where('gender','Male')->count();

        return $this->chart->barChart()
            ->setTitle('School Students Bar Chart.')
            ->setSubtitle('The chart for students gender.')
            ->addData('Gender', [ $females, $males ])
            ->setXAxis(['Female', 'Male']);
    }
}
