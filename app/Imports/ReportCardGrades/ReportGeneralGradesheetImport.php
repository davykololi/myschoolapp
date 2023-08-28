<?php

namespace App\Imports\ReportCardGrades;

use App\Imports\ReportCardGrades\MathematicsGradeSheetImport;
use App\Imports\ReportCardGrades\EnglishGradeSheetImport;
use App\Imports\ReportCardGrades\KiswahiliGradeSheetImport;
use App\Imports\ReportCardGrades\ChemistryGradeSheetImport;
use App\Imports\ReportCardGrades\BiologyGradeSheetImport;
use App\Imports\ReportCardGrades\PhysicsGradeSheetImport;
use App\Imports\ReportCardGrades\CREGradeSheetImport;
use App\Imports\ReportCardGrades\IslamGradeSheetImport;
use App\Imports\ReportCardGrades\HistoryGradeSheetImport;
use App\Imports\ReportCardGrades\GHCGradeSheetImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportGeneralGradesheetImport implements WithMultipleSheets
{
    protected $yearId,$termId,$classId,$exam,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$ghcId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId,$exam,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$ghcId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->classId = $classId;
        $this->exam = $exam;
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
        $examId = $this->exam->id;
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
            0 => new MathematicsGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$mathsId),
            1 => new EnglishGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$englishId),
            2 => new KiswahiliGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$kiswId),
            3 => new ChemistryGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$chemId),
            4 => new BiologyGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$bioId),
            5 => new PhysicsGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$physicsId),
            6 => new CREGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$creId),
            7 => new IslamGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$islamId),
            8 => new HistoryGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$histId),
            9 => new GHCGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$ghcId),
        ];
    }
}
