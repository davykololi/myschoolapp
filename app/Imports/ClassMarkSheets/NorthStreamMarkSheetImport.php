<?php

namespace App\Imports\ClassMarkSheets;

use App\Models\Mark;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class NorthStreamMarkSheetImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithUpserts
{
    protected $yearId,$termId,$examId,$classId,$teacherId,$northId;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$examId,$classId,$teacherId,$northId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->examId = $examId;
        $this->classId = $classId;
        $this->teacherId = $teacherId;
        $this->northId = $northId;
    }

    public function uniqueBy()
    {
        return 'exam_no';
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $student = Student::where('admission_no',$row['admission_no'])->first();

        return new Mark([
            //
            'name' => $row['name'],
            'admission_no' => $row['admission_no'],
            'exam_no' => $row['exam_no'],
            'mathematics' => $row['maths'],
            'english' => $row['eng'],
            'kiswahili' => $row['kisw'],
            'chemistry' => $row['chem'],
            'biology' => $row['bio'],
            'cre' => $row['cre'],
            'history_and_government' => $row['hgov'],
            'geography' => $row['geog'],
            'agriculture' => $row['agric'],
            'business_studies' => $row['bst'],
            'year_id' => $this->yearId,
            'term_id' => $this->termId,
            'exam_id' => $this->examId,
            'teacher_id' => $this->teacherId,
            'stream_id' => $this->getStreamId(),
            'class_id' => $this->classId,
            'student_id' => $student->id,
            'school_id' => auth()->user()->school->id,
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

    public function getStreamId()
    {
        $stream = Stream::where(['stream_section_id'=>$this->northId,'class_id'=>$this->classId])->first();

        return $stream->id;
    }
}
