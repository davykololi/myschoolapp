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

class WestStreamMarkSheetImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithUpserts
{
    protected $yearId,$termId,$examId,$classId,$teacherId,$westId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$examId,$classId,$teacherId,$westId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->examId = $examId;
        $this->classId = $classId;
        $this->teacherId = $teacherId;
        $this->westId = $westId;
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
        return new Mark([
            //
            'name' => $row['name'],
            'admission_no' => $row['admission_no'],
            'exam_no' => $row['exam_no'],
            'mathematics' => $row['maths'],
            'english' => $row['eng'],
            'kiswahili' => $row['kisw'],
            'cre' => $row['cre'],
            'history' => $row['hist'],
            'year_id' => $this->yearId,
            'term_id' => $this->termId,
            'exam_id' => $this->getExamId(),
            'teacher_id' => $this->teacherId,
            'stream_id' => $this->getStreamId(),
            'class_id' => $this->classId,
            'student_id' => $this->getStudentId(),
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

    public function getExamId()
    {
        $exam = Exam::where(['id'=>$this->examId,'year_id'=>$this->yearId,'term_id'=>$this->termId])->first();

        return $exam->id;
    }

    public function getStreamId()
    {
        $stream = Stream::where(['stream_section_id'=>$this->westId,'class_id'=>$this->classId])->first();

        return $stream->id;
    }

    public function getStudentId()
    {
        $stream = Stream::where(['stream_section_id'=>$this->westId,'class_id'=>$this->classId])->first();
        $strStudents = $stream->students()->leftJoin('marks','marks.admission_no','=','students.admission_no')->get()->pluck('id');
        foreach($strStudents as $st){
            $studentId = $st;

            return $st;
        }  
    }
}
