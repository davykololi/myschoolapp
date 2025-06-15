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
use App\Imports\SubjectGrades\HistoryAndGovernmentGradeSheetImport;
use App\Imports\SubjectGrades\GeogGradeSheetImport;
use App\Imports\SubjectGrades\HomeScienceGradeSheetImport;
use App\Imports\SubjectGrades\ArtAndDesignGradeSheetImport;
use App\Imports\SubjectGrades\AgricultureGradeSheetImport;
use App\Imports\SubjectGrades\BusinessStudiesGradeSheetImport;
use App\Imports\SubjectGrades\ComputerStudiesGradeSheetImport;
use App\Imports\SubjectGrades\DrawingAndDesignGradeSheetImport;
use App\Imports\SubjectGrades\FrenchGradeSheetImport;
use App\Imports\SubjectGrades\GermanGradeSheetImport;
use App\Imports\SubjectGrades\ArabicGradeSheetImport;
use App\Imports\SubjectGrades\SignLanguageGradeSheetImport;
use App\Imports\SubjectGrades\MusicGradeSheetImport;
use App\Imports\SubjectGrades\WoodWorkGradeSheetImport;
use App\Imports\SubjectGrades\MetalWorkGradeSheetImport;
use App\Imports\SubjectGrades\BuildingConstructionGradeSheetImport;
use App\Imports\SubjectGrades\PowerMechanicsGradeSheetImport;
use App\Imports\SubjectGrades\ElectricityGradeSheetImport;
use App\Imports\SubjectGrades\AviationTechnologyGradeSheetImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MarksGradesheetImport implements WithMultipleSheets
{
    protected $yearId,$termId,$classId,$exam,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histAndGovId,$geogId,$homeScienceId,$artAndDesignId,$agricultureId,$businessStudiesId,$computerStudiesId,$drawingAndDesignId,$frenchId,$germanId,$arabicId,$signLanguageId,$musicId,$woodWorkId,$metalWorkId,$buildingConstructionId,$powerMechanicsId,$electricityId,$aviationTechnologyId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId,$exam,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histAndGovId,$geogId,$homeScienceId,$artAndDesignId,$agricultureId,$businessStudiesId,$computerStudiesId,$drawingAndDesignId,$frenchId,$germanId,$arabicId,$signLanguageId,$musicId,$woodWorkId,$metalWorkId,$buildingConstructionId,$powerMechanicsId,$electricityId,$aviationTechnologyId)
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
        $this->histAndGovId = $histAndGovId;
        $this->geogId = $geogId;
        $this->homeScienceId = $homeScienceId;
        $this->artAndDesignId = $artAndDesignId;
        $this->agricultureId = $agricultureId;
        $this->businessStudiesId = $businessStudiesId;
        $this->computerStudiesId = $computerStudiesId;
        $this->drawingAndDesignId = $drawingAndDesignId;
        $this->frenchId = $frenchId;
        $this->germanId = $germanId;
        $this->arabicId = $arabicId;
        $this->signLanguageId = $signLanguageId;
        $this->musicId = $musicId;
        $this->woodWorkId = $woodWorkId;
        $this->metalWorkId = $metalWorkId;
        $this->buildingConstructionId = $buildingConstructionId;
        $this->powerMechanicsId = $powerMechanicsId;
        $this->electricityId = $electricityId;
        $this->aviationTechnologyId = $aviationTechnologyId;
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
        $histAndGovId = $this->histAndGovId;
        $geogId = $this->geogId;
        $homeScienceId = $this->homeScienceId;
        $artAndDesignId = $this->artAndDesignId;
        $agricultureId = $this->agricultureId;
        $businessStudiesId = $this->businessStudiesId;
        $computerStudiesId = $this->computerStudiesId;
        $drawingAndDesignId = $this->drawingAndDesignId;
        $frenchId = $this->frenchId;
        $germanId = $this->germanId;
        $arabicId = $this->arabicId;
        $signLanguageId = $this->signLanguageId;
        $musicId = $this->musicId;
        $woodWorkId = $this->woodWorkId;
        $metalWorkId = $this->metalWorkId;
        $buildingConstructionId = $this->buildingConstructionId;
        $powerMechanicsId = $this->powerMechanicsId;
        $electricityId = $this->electricityId;
        $aviationTechnologyId = $this->aviationTechnologyId;

        return [
            0 => new MathematicsGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$mathsId),
            1 => new EnglishGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$englishId),
            2 => new KiswahiliGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$kiswId),
            3 => new ChemistryGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$chemId),
            4 => new BiologyGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$bioId),
            5 => new PhysicsGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$physicsId),
            6 => new CREGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$creId),
            7 => new IslamGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$islamId),
            8 => new HistoryAndGovernmentGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$histAndGovId),
            9 => new GeogGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$geogId),
            10 => new HomeScienceGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$homeScienceId),
            11 => new ArtAndDesignGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$artAndDesignId),
            12 => new AgricultureGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$agricultureId),
            13 => new BusinessStudiesGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$businessStudiesId),
            14 => new ComputerStudiesGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$computerStudiesId),
            15 => new DrawingAndDesignGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$drawingAndDesignId),
            16 => new FrenchGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$frenchId),
            17 => new GermanGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$germanId),
            18 => new ArabicGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$arabicId),
            19 => new SignLanguageGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$signLanguageId),
            20 => new MusicGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$musicId),
            21 => new WoodWorkGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$woodWorkId),
            22 => new MetalWorkGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$metalWorkId),
            23 => new BuildingConstructionGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$buildingConstructionId),
            24 => new PowerMechanicsGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$powerMechanicsId),
            25 => new ElectricityGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$electricityId),
            26 => new AviationTechnologyGradeSheetImport($yearId,$termId,$classId,$examId,$teacherId,$aviationTechnologyId),
        ];
    }
}
