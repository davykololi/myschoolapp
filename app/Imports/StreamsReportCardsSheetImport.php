<?php

namespace App\Imports;

use App\Imports\NorthStreamReportCardSheetImport;
use App\Imports\SouthStreamReportCardSheetImport;
use App\Imports\WestStreamReportCardSheetImport;
use App\Imports\EastStreamReportCardSheetImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StreamsReportCardsSheetImport implements WithMultipleSheets
{
    protected $yearId;
    protected $termId;
    protected $classId;
    protected $teacherId;
    protected $northId;
    protected $southId;
    protected $westId;
    protected $eastId;
    protected $schoolId;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId,$teacherId,$northId,$southId,$westId,$eastId,$schoolId)
    {
    	$this->yearId = $yearId;
        $this->termId = $termId;
        $this->classId = $classId;
        $this->teacherId = $teacherId;
        $this->northId = $northId;
        $this->southId = $southId;
        $this->westId = $westId;
        $this->eastId = $eastId;
        $this->schoolId = $schoolId;
    }
    /**
    * @param Collection $collection
    */
    public function sheets(): array
    {
        $yearId = $this->yearId;
        $termId = $this->termId;
        $classId = $this->classId;
    	$teacherId = $this->teacherId;
    	$northId = $this->northId;
        $southId = $this->southId;
        $westId = $this->westId;
        $eastId = $this->eastId;
        $schoolId = $this->schoolId;
        return [
        	0 => new NorthStreamReportCardSheetImport($yearId,$termId,$classId,$teacherId,$northId,$schoolId),
        	1 => new SouthStreamReportCardSheetImport($yearId,$termId,$classId,$teacherId,$southId,$schoolId),
        	2 => new WestStreamReportCardSheetImport($yearId,$termId,$classId,$teacherId,$westId,$schoolId),
        	3 => new EastStreamReportCardSheetImport($yearId,$termId,$classId,$teacherId,$eastId,$schoolId),
        ];
    }
}
