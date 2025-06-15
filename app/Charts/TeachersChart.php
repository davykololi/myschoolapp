<?php

namespace App\Charts;

use Auth;
use App\Models\User;
use App\Models\Student;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class TeachersChart
{
    protected $tachersChart;

    public function __construct(LarapexChart $tachersChart)
    {
        $this->tachersChart = $tachersChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $maleTeachers = Auth::user()->school->male_teachers();
        $femaleTeachers = Auth::user()->school->female_teachers();

        return $this->tachersChart->barChart()
            ->setTitle('School Teachers Gender Bar Chart.')
            ->setSubtitle('The chart for teachers gender.')
            ->addData('Count', [ $femaleTeachers, $maleTeachers ])
            ->setXAxis(['Female Teachers', 'Male Teachers']);
    }
}
