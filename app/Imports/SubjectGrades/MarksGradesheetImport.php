<?php

namespace App\Imports\SubjectGrades;

use App\Imports\SubjectGrades\MathematicsGradeSheetImport;
use App\Imports\SubjectGrades\EnglishGradeSheetImport;
use App\Imports\SubjectGrades\KiswahiliGradeSheetImport;
use App\Imports\SubjectGrades\ChemistryGradeSheetImport;
use App\Imports\SubjectGrades\BiologyGradeSheetImport;
use App\Imports\SubjectGrades\PhysicsGradeSheetImport;
use App\Imports\SubjectGrades\CREGradeSheetImport;
use App\Imports\SubjectGrades\IslamGradeSheetImport;
use App\Imports\SubjectGrades\HistoryGradeSheetImport;
use App\Imports\SubjectGrades\GeogGradeSheetImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MarksGradesheetImport implements WithMultipleSheets
{
    protected $yearId,$termId,$classId,$exam,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$geogId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId,$exam,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$geogId)
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
        $this->geogId = $geogId;
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
        $geogId = $this->geogId;

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
            9 => new GeogGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$geogId),
        ];
    }
}
