<?php

namespace App\Imports\ReportCardSubjectGrades;

use App\Models\ReportSubjectGrade;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class BusinessStudiesGradeSheetImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithUpserts
{
    protected $yearId,$termId,$classId,$teacherId,$businessStudiesId;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId,$teacherId,$businessStudiesId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->classId = $classId;
        $this->teacherId = $teacherId;
        $this->businessStudiesId = $businessStudiesId;
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
        return new ReportSubjectGrade([
            //
            'grade' => $row['grade'],
            'grade_no' => $row['grade_no'],
            'points' => $row['points'],
            'from_mark' => $row['from_mark'],
            'to_mark' => $row['to_mark'],
            'year_id' => $this->yearId,
            'term_id' => $this->termId,
            'class_id' => $this->classId,
            'teacher_id' => $this->teacherId,
            'subject_id' => $this->businessStudiesId,
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
