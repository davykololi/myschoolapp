<?php

namespace App\Imports\SubjectGrades;

use App\Models\Grade;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class EnglishGradeSheetImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithUpserts
{
    protected $yearId,$termId,$classId,$examId,$teacherId,$englishId;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId,$examId,$teacherId,$englishId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->classId = $classId;
        $this->examId = $examId;
        $this->teacherId = $teacherId;
        $this->englishId = $englishId;
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
        return new Grade([
            //
            'grade' => $row['grade'],
            'grade_no' => $row['grade_no'],
            'points' => $row['points'],
            'from_mark' => $row['from_mark'],
            'to_mark' => $row['to_mark'],
            'year_id' => $this->yearId,
            'term_id' => $this->termId,
            'class_id' => $this->classId,
            'exam_id' => $this->examId,
            'teacher_id' => $this->teacherId,
            'subject_id' => $this->englishId,
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
