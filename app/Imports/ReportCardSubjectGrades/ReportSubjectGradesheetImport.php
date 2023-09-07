<?php

namespace App\Imports\ReportCardSubjectGrades;

use App\Imports\ReportCardSubjectGrades\MathematicsGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\EnglishGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\KiswahiliGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\ChemistryGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\BiologyGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\PhysicsGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\CREGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\IslamGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\HistoryGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\GHCGradeSheetImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportSubjectGradesheetImport implements WithMultipleSheets
{
    protected $yearId,$termId,$classId,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$ghcId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$ghcId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->classId = $classId;
        $this->teacherId = $teacherId;
        $this->mathsId = $mathsId;
        $this->englishId = $englishId;
        $this->kiswId = $kiswId;
        $this->chemId = $chemId;
        $this->bioId = $bioId;
        $this->physicsId = $physicsId;
        $this->creId = $creId;
        $this->islamId = $islamId;
        $this->histId = $histId;
        $this->ghcId = $ghcId;
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
        $mathsId = $this->mathsId;
        $englishId = $this->englishId;
        $kiswId = $this->kiswId;
        $chemId = $this->chemId;
        $bioId = $this->bioId;
        $physicsId = $this->physicsId;
        $creId = $this->creId;
        $islamId = $this->islamId;
        $histId = $this->histId;
        $ghcId = $this->ghcId;

        return [
            0 => new MathematicsGradeSheetImport($yearId,$termId,$classId,$teacherId,$mathsId),
            1 => new EnglishGradeSheetImport($yearId,$termId,$classId,$teacherId,$englishId),
            2 => new KiswahiliGradeSheetImport($yearId,$termId,$classId,$teacherId,$kiswId),
            3 => new ChemistryGradeSheetImport($yearId,$termId,$classId,$teacherId,$chemId),
            4 => new BiologyGradeSheetImport($yearId,$termId,$classId,$teacherId,$bioId),
            5 => new PhysicsGradeSheetImport($yearId,$termId,$classId,$teacherId,$physicsId),
            6 => new CREGradeSheetImport($yearId,$termId,$classId,$teacherId,$creId),
            7 => new IslamGradeSheetImport($yearId,$termId,$classId,$teacherId,$islamId),
            8 => new HistoryGradeSheetImport($yearId,$termId,$classId,$teacherId,$histId),
            9 => new GHCGradeSheetImport($yearId,$termId,$classId,$teacherId,$ghcId),
        ];
    }
}
