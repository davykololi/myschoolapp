<?php

namespace App\Imports;

use App\Models\ReportCard;
use App\Models\Stream;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class WestStreamReportCardSheetImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithUpserts
{
    protected $yearId;
    protected $termId;
    protected $classId;
    protected $teacherId;
    protected $westId;
    protected $schoolId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId,$teacherId,$westId,$schoolId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->classId = $classId;
        $this->teacherId = $teacherId;
        $this->westId = $westId;
        $this->schoolId = $schoolId;
    }

    public function uniqueBy()
    {
        $stream = Stream::where(['stream_section_id'=>$this->westId,'class_id'=>$this->classId])->first();

        return $stream->id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $stream = Stream::where(['stream_section_id'=>$this->westId,'class_id'=>$this->classId])->first();

        return new ReportCard([
            //
            'name' => $row['name'],
            'maths' => $row['maths'],
            'eng' => $row['eng'],
            'kisw' => $row['kisw'],
            'chem' => $row['chem'],
            'bio' => $row['bio'],
            'physics' => $row['physics'],
            'cre' => $row['cre'],
            'islam' => $row['islam'],
            'hist' => $row['hist'],
            'ghc' => $row['ghc'],
            'recommendation' => $row['recommendation'],
            'school_id' => $this->schoolId,
            'stream_id' => $stream->id,
            'class_id' => $this->classId,
            'teacher_id' => $this->teacherId,
            'year_id' => $this->yearId,
            'term_id' => $this->termId,
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
