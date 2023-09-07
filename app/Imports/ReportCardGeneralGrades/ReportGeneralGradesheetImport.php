<?php

namespace App\Imports\ReportCardGeneralGrades;

use App\Models\ReportGeneralGrade;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ReportGeneralGradesheetImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithUpserts
{
    protected $yearId,$termId,$classId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->classId = $classId;
    }

    public function uniqueBy()
    {
        return 'grade_no';
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ReportGeneralGrade([
            //
            'grade' => $row['grade'],
            'grade_no' => $row['grade_no'],
            'points' => $row['points'],
            'from_mark' => $row['from_mark'],
            'to_mark' => $row['to_mark'],
            'year_id' => $this->yearId,
            'term_id' => $this->termId,
            'class_id' => $this->classId,
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
