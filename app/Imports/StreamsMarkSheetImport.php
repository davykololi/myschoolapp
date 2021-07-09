<?php

namespace App\Imports;

use App\Imports\NorthStreamMarkSheetImport;
use App\Imports\SouthStreamMarkSheetImport;
use App\Imports\WestStreamMarkSheetImport;
use App\Imports\EastStreamMarkSheetImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StreamsMarkSheetImport implements WithMultipleSheets
{
    protected $yearId;
    protected $termId;
    protected $examId;
    protected $classId;
    protected $teacherId;
    protected $northId;
    protected $southId;
    protected $westId;
    protected $eastId;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$examId,$classId,$teacherId,$northId,$southId,$westId,$eastId)
    {
    	$this->yearId = $yearId;
        $this->termId = $termId;
        $this->examId = $examId;
        $this->classId = $classId;
        $this->teacherId = $teacherId;
        $this->northId = $northId;
        $this->southId = $southId;
        $this->westId = $westId;
        $this->eastId = $eastId;
    }
    /**
    * @param Collection $collection
    */
    public function sheets(): array
    {
        $yearId = $this->yearId;
        $termId = $this->termId;
    	$examId = $this->examId;
        $classId = $this->classId;
    	$teacherId = $this->teacherId;
    	$northId = $this->northId;
        $southId = $this->southId;
        $westId = $this->westId;
        $eastId = $this->eastId;
        return [
        	0 => new NorthStreamMarkSheetImport($yearId,$termId,$examId,$classId,$teacherId,$northId),
        	1 => new SouthStreamMarkSheetImport($yearId,$termId,$examId,$classId,$teacherId,$southId),
        	2 => new WestStreamMarkSheetImport($yearId,$termId,$examId,$classId,$teacherId,$westId),
        	3 => new EastStreamMarkSheetImport($yearId,$termId,$examId,$classId,$teacherId,$eastId),
        ];
    }
}
