<?php

namespace App\Exports;

use App\Models\ReportCard;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ReportCard::all();
    }

    public function headings(): array
    {
        return [
            'NAME',
            'MATHEMATICS',
            'ENGLISH',
            'KISWAHILI',
            'SCIENCE',
            'C.R.E',
            'RECOMMENDATION',
        ];
    }

    public function map($report): array
    {
        return [
            $report->name,
            $report->maths_mark,
            $report->english_mark,
            $report->kisw_mark,
            $report->science_mark,
            $report->cre_mark,
            $report->recommendation,
        ];
    }
}
