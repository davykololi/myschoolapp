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
use App\Imports\ReportCardSubjectGrades\HistoryAndGovernmentGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\GeogGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\HomeScienceGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\ArtAndDesignGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\AgricultureGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\BusinessStudiesGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\ComputerStudiesGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\DrawingAndDesignGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\FrenchGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\GermanGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\ArabicGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\SignLanguageGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\MusicGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\WoodWorkGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\MetalWorkGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\BuildingConstructionGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\PowerMechanicsGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\ElectricityGradeSheetImport;
use App\Imports\ReportCardSubjectGrades\AviationTechnologyGradeSheetImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportSubjectGradesheetImport implements WithMultipleSheets
{
    protected $yearId,$termId,$classId,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histAndGovId,$geogId,$homeScienceId,$artAndDesignId,$agricultureId,$businessStudiesId,$computerStudiesId,$drawingAndDesignId,$frenchId,$germanId,$arabicId,$signLanguageId,$musicId,$woodWorkId,$metalWorkId,$buildingConstructionId,$powerMechanicsId,$electricityId,$aviationTechnologyId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$classId,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histAndGovId,$geogId,$homeScienceId,$artAndDesignId,$agricultureId,$businessStudiesId,$computerStudiesId,$drawingAndDesignId,$frenchId,$germanId,$arabicId,$signLanguageId,$musicId,$woodWorkId,$metalWorkId,$buildingConstructionId,$powerMechanicsId,$electricityId,$aviationTechnologyId)
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
            0 => new MathematicsGradeSheetImport($yearId,$termId,$classId,$teacherId,$mathsId),
            1 => new EnglishGradeSheetImport($yearId,$termId,$classId,$teacherId,$englishId),
            2 => new KiswahiliGradeSheetImport($yearId,$termId,$classId,$teacherId,$kiswId),
            3 => new ChemistryGradeSheetImport($yearId,$termId,$classId,$teacherId,$chemId),
            4 => new BiologyGradeSheetImport($yearId,$termId,$classId,$teacherId,$bioId),
            5 => new PhysicsGradeSheetImport($yearId,$termId,$classId,$teacherId,$physicsId),
            6 => new CREGradeSheetImport($yearId,$termId,$classId,$teacherId,$creId),
            7 => new IslamGradeSheetImport($yearId,$termId,$classId,$teacherId,$islamId),
            8 => new HistoryAndGovernmentGradeSheetImport($yearId,$termId,$classId,$teacherId,$histAndGovId),
            9 => new GeogGradeSheetImport($yearId,$termId,$classId,$teacherId,$geogId),
            10 => new HomeScienceGradeSheetImport($yearId,$termId,$classId,$teacherId,$homeScienceId),
            11 => new ArtAndDesignGradeSheetImport($yearId,$termId,$classId,$teacherId,$artAndDesignId),
            12 => new AgricultureGradeSheetImport($yearId,$termId,$classId,$teacherId,$agricultureId),
            13 => new BusinessStudiesGradeSheetImport($yearId,$termId,$classId,$teacherId,$businessStudiesId),
            14 => new ComputerStudiesGradeSheetImport($yearId,$termId,$classId,$teacherId,$computerStudiesId),
            15 => new DrawingAndDesignGradeSheetImport($yearId,$termId,$classId,$teacherId,$drawingAndDesignId),
            16 => new FrenchGradeSheetImport($yearId,$termId,$classId,$teacherId,$frenchId),
            17 => new GermanGradeSheetImport($yearId,$termId,$classId,$teacherId,$germanId),
            18 => new ArabicGradeSheetImport($yearId,$termId,$classId,$teacherId,$arabicId),
            19 => new SignLanguageGradeSheetImport($yearId,$termId,$classId,$teacherId,$signLanguageId),
            20 => new MusicGradeSheetImport($yearId,$termId,$classId,$teacherId,$musicId),
            21 => new WoodWorkGradeSheetImport($yearId,$termId,$classId,$teacherId,$woodWorkId),
            22 => new MetalWorkGradeSheetImport($yearId,$termId,$classId,$teacherId,$metalWorkId),
            23 => new BuildingConstructionGradeSheetImport($yearId,$termId,$classId,$teacherId,$buildingConstructionId),
            24 => new PowerMechanicsGradeSheetImport($yearId,$termId,$classId,$teacherId,$powerMechanicsId),
            25 => new ElectricityGradeSheetImport($yearId,$termId,$classId,$teacherId,$electricityId),
            26 => new AviationTechnologyGradeSheetImport($yearId,$termId,$classId,$teacherId,$aviationTechnologyId),
        ];
    }
}
