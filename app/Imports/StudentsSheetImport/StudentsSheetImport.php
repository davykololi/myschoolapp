<?php

namespace App\Imports\StudentsImportSheets;

use App\Imports\StudentsSheetImport\NorthStreamStudentsSheetImport;
use App\Imports\StudentsSheetImport\SouthStreamStudentsSheetImport;
use App\Imports\StudentsSheetImport\WestStreamStudentsSheetImport;
use App\Imports\StudentsSheetImport\EastStreamStudentsSheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StudentsSheetImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            0 => new NorthStreamStudentsSheetImport($yearId,$termId,$examId,$classId,$teacherId,$northId),
            1 => new SouthStreamStudentsSheetImport($yearId,$termId,$examId,$classId,$teacherId,$southId),
            2 => new WestStreamStudentsSheetImport($yearId,$termId,$examId,$classId,$teacherId,$westId),
            3 => new EastStreamStudentsSheetImport($yearId,$termId,$examId,$classId,$teacherId,$eastId),
        ];
    }
}
