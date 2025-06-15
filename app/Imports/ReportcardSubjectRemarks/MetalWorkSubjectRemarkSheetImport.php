<?php

namespace App\Imports\ReportcardSubjectRemarks;

use App\Models\SubjectRemark;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class MetalWorkSubjectRemarkSheetImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithUpserts
{
    protected $yearId,$termId,$streamId,$teacherId,$metalWorkId;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$streamId,$teacherId,$metalWorkId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->streamId = $streamId;
        $this->teacherId = $teacherId;
        $this->metalWorkId = $metalWorkId;
    }

    public function uniqueBy()
    {
        return 'remark_id';
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SubjectRemark([
            //
            'remark' => $row['remark'],
            'remark_id' => $row['remark_id'],
            'from_mark' => $row['from_mark'],
            'to_mark' => $row['to_mark'],
            'year_id' => $this->yearId,
            'term_id' => $this->termId,
            'stream_id' => $this->streamId,
            'teacher_id' => $this->metalWorkId,
            'subject_id' => $this->woodWorkId,
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
}
