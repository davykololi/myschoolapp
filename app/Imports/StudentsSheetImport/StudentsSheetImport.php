<?php

namespace App\Imports\StudentsSheetImport;

use App\Imports\StudentsSheetImport\NorthStreamStudentsSheetImport;
use App\Imports\StudentsSheetImport\SouthStreamStudentsSheetImport;
use App\Imports\StudentsSheetImport\WestStreamStudentsSheetImport;
use App\Imports\StudentsSheetImport\EastStreamStudentsSheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StudentsSheetImport implements WithMultipleSheets
{
    protected $dormId, $intakeId, $northId, $southId, $westId, $eastId;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($dormId,$intakeId,$northId,$southId,$westId,$eastId)
    {
        $this->dormId = $dormId;
        $this->intakeId = $intakeId;
        $this->northId = $northId;
        $this->southId = $southId;
        $this->westId = $westId;
        $this->eastId = $eastId;
    }


    public function sheets(): array
    {
        $dormId = $this->dormId;
        $intakeId = $this->intakeId;
        $northId = $this->northId;
        $southId = $this->southId;
        $westId = $this->westId;
        $eastId = $this->eastId;

        return [
            0 => new NorthStreamStudentsSheetImport($dormId, $intakeId,$northId),
            1 => new SouthStreamStudentsSheetImport($dormId, $intakeId,$southId),
            2 => new WestStreamStudentsSheetImport($dormId, $intakeId,$westId),
            3 => new EastStreamStudentsSheetImport($dormId, $intakeId,$eastId),
        ];
    }
}
