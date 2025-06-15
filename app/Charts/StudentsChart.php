<?php

namespace App\Charts;

use Auth;
use App\Models\User;
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
        $maleStudents = Auth::user()->school->male_students();
        $femaleStudents = Auth::user()->school->female_students();

        return $this->chart->barChart()
            ->setTitle('School Students Gender Bar Chart.')
            ->setSubtitle('The chart for students gender.')
            ->addData('Count', [ $femaleStudents, $maleStudents ])
            ->setXAxis(['Female', 'Male']);
    }
}
