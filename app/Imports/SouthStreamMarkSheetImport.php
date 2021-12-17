<?php

namespace App\Imports;

use App\Models\Mark;
use App\Models\Stream;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class SouthStreamMarkSheetImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithUpserts
{
    protected $yearId;
    protected $termId;
    protected $examId;
    protected $classId;
    protected $teacherId;
    protected $southId;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$examId,$classId,$teacherId,$southId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->examId = $examId;
        $this->classId = $classId;
        $this->teacherId = $teacherId;
        $this->southId = $southId;
    }

    public function uniqueBy()
    {
        return 'index_no';
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $stream = Stream::where(['stream_section_id'=>$this->southId,'class_id'=>$this->classId])->first();

        return new Mark([
            //
            'name' => $row['name'],
            'index_no' => $row['index_no'],
            'mathematics' => $row['maths'],
            'english' => $row['eng'],
            'kiswahili' => $row['kisw'],
            'chemistry' => $row['chem'],
            'physics' => $row['physics'],
            'year_id' => $this->yearId,
            'term_id' => $this->termId,
            'exam_id' => $this->examId,
            'teacher_id' => $this->teacherId,
            'stream_id' => $stream->id,
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
