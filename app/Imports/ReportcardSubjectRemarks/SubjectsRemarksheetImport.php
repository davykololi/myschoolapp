<?php

namespace App\Imports\ReportcardSubjectRemarks;

use App\Imports\ReportcardSubjectRemarks\MathematicsSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\EnglishSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\KiswahiliSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\ChemistrySubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\BiologySubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\PhysicsSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\CRESubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\IslamSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\HistorySubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\GeogSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\HomeScienceSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\ArtAndDesignSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\AgricultureSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\BusinessStudiesSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\ComputerStudiesSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\DrawingAndDesignSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\FrenchSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\GermanSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\ArabicSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\SignLanguageSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\MusicSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\WoodWorkSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\MetalWorkSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\BuildingConstructionSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\PowerMechanicsSubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\ElectricitySubjectRemarkSheetImport;
use App\Imports\ReportcardSubjectRemarks\AviationTechnologySubjectRemarkSheetImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SubjectsRemarksheetImport implements WithMultipleSheets
{
    protected $yearId,$termId,$streamId,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$geogId,$homeScienceId,$artAndDesignId,$agricultureId,$businessStudiesId,$computerStudiesId,$drawingAndDesignId,$frenchId,$germanId,$arabicId,$signLanguageId,$musicId,$woodWorkId,$metalWorkId,$buildingConstructionId,$powerMechanicsId,$electricityId,$aviationTechnologyId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($yearId,$termId,$streamId,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$geogId,$homeScienceId,$artAndDesignId,$agricultureId,$businessStudiesId,$computerStudiesId,$drawingAndDesignId,$frenchId,$germanId,$arabicId,$signLanguageId,$musicId,$woodWorkId,$metalWorkId,$buildingConstructionId,$powerMechanicsId,$electricityId,$aviationTechnologyId)
    {
        $this->yearId = $yearId;
        $this->termId = $termId;
        $this->streamId = $streamId;
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
        $streamId = $this->streamId;
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
            0 => new MathematicsSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$mathsId),
            1 => new EnglishSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$englishId),
            2 => new KiswahiliSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$kiswId),
            3 => new ChemistrySubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$chemId),
            4 => new BiologySubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$bioId),
            5 => new PhysicsSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$physicsId),
            6 => new CRESubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$creId),
            7 => new IslamSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$islamId),
            8 => new HistorySubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$histId),
            9 => new GeogSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$geogId),
            10 => new HomeScienceSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$homeScienceId),
            11 => new ArtAndDesignSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$artAndDesignId),
            12 => new AgricultureSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$agricultureId),
            13 => new BusinessStudiesSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$businessStudiesId),
            14 => new ComputerStudiesSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$computerStudiesId),
            15 => new DrawingAndDesignSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$drawingAndDesignId),
            16 => new FrenchSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$frenchId),
            17 => new GermanSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$germanId),
            18 => new ArabicSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$arabicId),
            19 => new SignLanguageSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$signLanguageId),
            20 => new MusicSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$musicId),
            21 => new WoodWorkSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$woodWorkId),
            22 => new MetalWorkSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$metalWorkId),
            23 => new BuildingConstructionSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$buildingConstructionId),
            24 => new PowerMechanicsSubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$powerMechanicsId),
            25 => new ElectricitySubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$electricityId),
            26 => new AviationTechnologySubjectRemarkSheetImport($yearId,$termId,$streamId,$teacherId,$aviationTechnologyId),
        ];
    }
}
