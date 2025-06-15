<?php

namespace App\Http\Controllers\Admin\Excel;

use App\Models\Stream;
use App\Models\Year;
use App\Models\Term;
use App\Models\Subject;
use App\Enums\SubjectsEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ReportcardSubjectRemarks\SubjectsRemarksheetImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminSubjectRemarkController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }

    public function subjectsRemarks(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $streamId = $request->stream_id;
        $teacherId = $request->teacher_id;

        $maths = Subject::whereName(SubjectsEnum::MATHS->value)->firstOrFail();
        $mathsId = $maths->id;
        $english = Subject::whereName(SubjectsEnum::ENG->value)->firstOrFail();
        $englishId = $english->id;
        $kisw = Subject::whereName(SubjectsEnum::KISW->value)->firstOrFail();
        $kiswId = $kisw->id;
        $chem = Subject::whereName(SubjectsEnum::CHEM->value)->firstOrFail();
        $chemId = $chem->id;
        $biology = Subject::whereName(SubjectsEnum::BIO->value)->firstOrFail();
        $bioId = $biology->id;
        $physics = Subject::whereName(SubjectsEnum::PHY->value)->firstOrFail();
        $physicsId = $physics->id;
        $cre = Subject::whereName(SubjectsEnum::CRE->value)->firstOrFail();
        $creId = $cre->id;
        $islam = Subject::whereName(SubjectsEnum::ISLM->value)->firstOrFail();
        $islamId = $islam->id;
        $hist = Subject::whereName(SubjectsEnum::HIST->value)->firstOrFail();
        $histId = $hist->id;
        $geog = Subject::whereName(SubjectsEnum::GEOG->value)->firstOrFail();
        $geogId = $geog->id;
        $homeScience = Subject::whereName(SubjectsEnum::HOMESC->value)->firstOrFail();
        $homeScienceId = $homeScience->id;
        $artAndDesign = Subject::whereName(SubjectsEnum::ARTDSGN->value)->firstOrFail();
        $artAndDesignId = $artAndDesign->id;
        $agriculture = Subject::whereName(SubjectsEnum::AGRIC->value)->firstOrFail();
        $agricultureId = $agriculture->id;
        $businessStudies = Subject::whereName(SubjectsEnum::BUZSTRDS->value)->firstOrFail();
        $businessStudiesId = $businessStudies->id;
        $computerStudies = Subject::whereName(SubjectsEnum::COMPSTRDS->value)->firstOrFail();
        $computerStudiesId = $computerStudies->id;
        $drawingAndDesign = Subject::whereName(SubjectsEnum::DRWNDGN->value)->firstOrFail();
        $drawingAndDesignId =  $drawingAndDesign->id;
        $french = Subject::whereName(SubjectsEnum::FRNCH->value)->firstOrFail();
        $frenchId = $french->id;
        $german = Subject::whereName(SubjectsEnum::GRMN->value)->firstOrFail();
        $germanId = $german->id;
        $arabic = Subject::whereName(SubjectsEnum::ARBC->value)->firstOrFail();
        $arabicId = $arabic->id;
        $signLanguage = Subject::whereName(SubjectsEnum::SGNLANG->value)->firstOrFail();
        $signLanguageId = $signLanguage->id;
        $music = Subject::whereName(SubjectsEnum::MSC->value)->firstOrFail();
        $musicId = $music->id;
        $woodWork = Subject::whereName(SubjectsEnum::WDWK->value)->firstOrFail();
        $woodWorkId = $woodWork->id;
        $metalWork = Subject::whereName(SubjectsEnum::MTWK->value)->firstOrFail();
        $metalWorkId = $metalWork->id;
        $buildingConstruction = Subject::whereName(SubjectsEnum::BUILDCON->value)->firstOrFail();
        $buildingConstructionId = $buildingConstruction->id;
        $powerMechanics = Subject::whereName(SubjectsEnum::PWRMC->value)->firstOrFail();
        $powerMechanicsId = $powerMechanics->id;
        $electricity = Subject::whereName(SubjectsEnum::ELEC->value)->firstOrFail();
        $electricityId =  $electricity->id;
        $aviationTechnology = Subject::whereName(SubjectsEnum::AVTEC->value)->firstOrFail();
        $aviationTechnologyId =  $aviationTechnology->id;
        
        $stream = Stream::whereId($streamId)->first();
        $year = Year::whereId($yearId)->first();
        $term = Term::whereId($termId)->first();
    
        $requestedFile = request()->file('file');
        if(($yearId === null) || ($termId === null) || ($streamId === null) || (empty($requestedFile))){
            return back()->withErrors('Please fill in the required details before you proceed!');
        } 

        \Excel::import(new SubjectsRemarksheetImport($yearId,$termId,$streamId,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$geogId,$homeScienceId,$artAndDesignId,$agricultureId,$businessStudiesId,$computerStudiesId,$drawingAndDesignId,$frenchId,$germanId,$arabicId,$signLanguageId,$musicId,$woodWorkId,$metalWorkId,$buildingConstructionId,$powerMechanicsId,$electricityId,$aviationTechnologyId),$requestedFile);

        \Session::flash('success', $term->name." ".$stream->name." ".'Subjects Remarks Uploaded Successfully');

        return back();
    }
}
