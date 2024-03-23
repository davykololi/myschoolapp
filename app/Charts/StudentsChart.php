<?php

namespace App\Charts;

use Auth;
use App\Models\Student;
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
        
        $females = Student::where('user_id',Auth::id())->where('gender','Female')->count();
        $males = Student::where('user_id',Auth::id())->where('gender','Male')->count();

        return $this->chart->barChart()
            ->setTitle('School Students Bar Chart.')
            ->setSubtitle('The chart for students gender.')
            ->addData('Gender', [ $females, $males ])
            ->setXAxis(['Female', 'Male']);
    }
}
