<?php

namespace App\Imports\ReportCardImport;

use App\Models\ReportComment;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class ReportcardCommentsSheetImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithUpserts
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
        return 'comment_no';
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ReportComment([
            //
            'comment' => $row['comment'],
            'comment_no' => $row['comment_no'],
            'from_total' => $row['from_total'],
            'to_total' => $row['to_total'],
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
