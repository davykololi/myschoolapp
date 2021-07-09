<?php

namespace App\Imports;

use App\Models\Mark;
use App\Models\Stream;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class NorthStreamMarkSheetImport implements ToModel,WithHeadingRow
{
    protected $yearId;
    protected $termId;
    protected $examId;
    protected $classId;
    protected $teacherId;
    protected $northId;
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

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $classId = $this->classId;
        $northId = $this->northId;
        $stream = Stream::where(['stream_section_id' =>$northId,'class_id'=>$classId])->first();
        $streamId = $stream->id;
        return new Mark([
            //
            'name' => $row['name'],
            'mathematics' => $row['maths'],
            'english' => $row['eng'],
            'kiswahili' => $row['kisw'],
            'chemistry' => $row['chem'],
            'biology' => $row['bio'],
            'year_id' => $this->yearId,
            'term_id' => $this->termId,
            'exam_id' => $this->examId,
            'teacher_id' => $this->teacherId,
            'stream_id' => $streamId,
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
