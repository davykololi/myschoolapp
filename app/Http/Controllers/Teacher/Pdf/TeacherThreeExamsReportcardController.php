<?php

namespace App\Http\Controllers\Teacher\Pdf;

use PDF;
use Auth;
use Session;
use App\Models\Year;
use App\Models\Term;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Mark;
use App\Models\ReportSubjectGrade;
use App\Models\ReportMeanGrade;
use Illuminate\Support\Str;
use HiFolks\Statistics\Stat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class TeacherThreeExamsReportcardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:teacher');
        $this->middleware('teacher-banned');
        $this->middleware('checktwofa');
    }

    public function threeExamsReportCard(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $streamId = $request->stream_id;
        $name = Str::lower($request->name);
        $closingDate = $request->closing_date;
        $openingDate = $request->opening_date;

        // The general required requests not done error
        if((is_null($yearId)) || (is_null($termId)) || (is_null($streamId)) || (is_null($name)) || (is_null(auth()->user()->school->image)) || (is_null($closingDate)) || (is_null($openingDate))){
            return back()->withError(ucwords('Please ensure you have filled all the required details before you proceed!'));
        }
        
        //Obtained exams ids to array
        $array = Session::get('rtExams');
        $examOneId = $array[0];
        $examTwoId  = $array[1];
        $examThreeId = $array[2];

        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();
        $stream = Stream::where(['id'=>$streamId])->first();
        $examOne = Exam::where(['id'=>$examOneId,'term_id'=>$termId,'year_id'=>$yearId])->firstOrFail();
        $examTwo = Exam::where(['id'=>$examTwoId,'term_id'=>$termId,'year_id'=>$yearId])->firstOrFail();
        $examThree = Exam::where(['id'=>$examThreeId,'term_id'=>$termId,'year_id'=>$yearId])->firstOrFail();
        $streamStudents = collect($stream->students()->with('user')->get()->pluck('user.full_name')->toArray());
        $values = $streamStudents->values();

        // The student name not among the stream students names error
        if($values->doesntContain(ucwords($name))){
            return back()->withError(ucwords($name)." "."does not belong to"." ".$stream->name.". "."Please choose the correct stream and proceed!");
        }   

        $mark = mark($yearId,$termId,$streamId,$name);
        $markName = $mark->name;

        //Three exams report card required general requests not done well error
        if(($yearId === null) || ($termId === null) || ($examOneId === null) || ($examTwoId === null) || ($examThreeId === null) || empty($name) || (auth()->user()->school->image === null) || ($streamId === null) || ($markName === null)){
            return back()->withError(ucwords('Please ensure you have filled all the required details!'));
        }
 
        $examOneMark = Mark::where(['name'=>$markName,'stream_id'=>$stream->id,'exam_id'=>$examOneId])->first();
        $examTwoMark = Mark::where(['name'=>$markName,'stream_id'=>$stream->id,'exam_id'=>$examTwoId])->first();
        $examThreeMark = Mark::where(['name'=>$markName,'stream_id'=>$stream->id,'exam_id'=>$examThreeId])->first();

        $mathsAvg = Stat::mean([$examOneMark->mathematics,$examTwoMark->mathematics,$examThreeMark->mathematics]);
        $engAvg = Stat::mean([$examOneMark->english,$examTwoMark->english,$examThreeMark->english]);
        $kiswAvg = Stat::mean([$examOneMark->kiswahili,$examTwoMark->kiswahili,$examThreeMark->kiswahili]);
        $chemAvg = Stat::mean([$examOneMark->chemistry,$examTwoMark->chemistry,$examThreeMark->chemistry]);
        $bioAvg = Stat::mean([$examOneMark->biology,$examTwoMark->biology,$examThreeMark->biology]);
        $physicsAvg = Stat::mean([$examOneMark->physics,$examTwoMark->physics,$examThreeMark->physics]);
        $creAvg = Stat::mean([$examOneMark->cre,$examTwoMark->cre,$examThreeMark->cre]);
        $islamAvg = Stat::mean([$examOneMark->islam,$examTwoMark->islam,$examThreeMark->islam]);
        $histAndGovernmentAvg = Stat::mean([$examOneMark->history_and_government,$examTwoMark->history_and_government,$examThreeMark->history_and_government]);
        $geogAvg = Stat::mean([$examOneMark->geography,$examTwoMark->geography,$examThreeMark->geography]);
        $homeScienceAvg = Stat::mean([$examOneMark->home_science,$examTwoMark->home_science,$examThreeMark->home_science]);
        $artAndDesignAvg = Stat::mean([$examOneMark->art_and_design,$examTwoMark->art_and_design,$examThreeMark->art_and_design]);
        $agricultureAvg = Stat::mean([$examOneMark->agriculture,$examTwoMark->agriculture,$examThreeMark->agriculture]);
        $businessStudiesAvg = Stat::mean([$examOneMark->business_studies,$examTwoMark->business_studies,$examThreeMark->business_studies]);
        $computerStudiesAvg = Stat::mean([$examOneMark->computer_studies,$examTwoMark->computer_studies,$examThreeMark->computer_studies]);
        $drawingAndDesignAvg = Stat::mean([$examOneMark->drawing_and_design,$examTwoMark->drawing_and_design,$examThreeMark->drawing_and_design]);
        $frenchAvg = Stat::mean([$examOneMark->french,$examTwoMark->french,$examThreeMark->french]);
        $germanAvg = Stat::mean([$examOneMark->german,$examTwoMark->german,$examThreeMark->german]);
        $arabicAvg = Stat::mean([$examOneMark->arabic,$examTwoMark->arabic,$examThreeMark->arabic]);
        $signLanguageAvg = Stat::mean([$examOneMark->sign_language,$examTwoMark->sign_language,$examThreeMark->sign_language]);
        $musicAvg = Stat::mean([$examOneMark->music,$examTwoMark->music,$examThreeMark->music]);
        $woodWorkAvg = Stat::mean([$examOneMark->wood_work,$examTwoMark->wood_work,$examThreeMark->wood_work]);
        $metalWorkAvg = Stat::mean([$examOneMark->metal_work,$examTwoMark->metal_work,$examThreeMark->metal_work]);
        $buildingConstructionAvg = Stat::mean([$examOneMark->building_construction,$examTwoMark->building_construction,$examThreeMark->building_construction]);
        $powerMechanicsAvg = Stat::mean([$examOneMark->power_mechanics,$examTwoMark->power_mechanics,$examThreeMark->power_mechanics]); 
        $electricityAvg = Stat::mean([$examOneMark->electricity,$examTwoMark->electricity,$examThreeMark->electricity]); 
        $aviationTechnologyAvg = Stat::mean([$examOneMark->aviation_technology,$examTwoMark->aviation_technology,$examThreeMark->aviation_technology]);

        //Subjects Remarks
        if(!is_null($streamId) || (!is_null($yearId) || (!is_null($termId)))){
            $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
        }

        //Start of Specific Remarks as per the performance in each subject 
        $mathsSubjectRemarks = mathsSubjectRemarks($mathsAvg,$yearId,$termId,$streamId);
        $englishSubjectRemarks = englishSubjectRemarks($engAvg,$yearId,$termId,$streamId);
        $kiswahiliSubjectRemarks = kiswahiliSubjectRemarks($kiswAvg,$yearId,$termId,$streamId);
        $chemistrySubjectRemarks = chemistrySubjectRemarks($chemAvg,$yearId,$termId,$streamId);
        $biologySubjectRemarks = biologySubjectRemarks($bioAvg,$yearId,$termId,$streamId);
        $physicsSubjectRemarks = physicsSubjectRemarks($physicsAvg,$yearId,$termId,$streamId);
        $creSubjectRemarks = creSubjectRemarks($creAvg,$yearId,$termId,$streamId);
        $islamSubjectRemarks = islamSubjectRemarks($islamAvg,$yearId,$termId,$streamId);
        $historyAndGovernmentSubjectRemarks = historyAndGovernmentSubjectRemarks($histAndGovernmentAvg,$yearId,$termId,$streamId);
        $geographySubjectRemarks = geographySubjectRemarks($geogAvg,$yearId,$termId,$streamId);
        $homeScienceSubjectRemarks = homeScienceSubjectRemarks($homeScienceAvg,$yearId,$termId,$streamId);
        $artAndDesignSubjectRemarks = artAndDesignSubjectRemarks($artAndDesignAvg,$yearId,$termId,$streamId);
        $agricultureSubjectRemarks = agricultureSubjectRemarks($agricultureAvg,$yearId,$termId,$streamId);
        $businessStudiesSubjectRemarks = businessStudiesSubjectRemarks($businessStudiesAvg,$yearId,$termId,$streamId);
        $computerStudiesSubjectRemarks = computerStudiesSubjectRemarks($computerStudiesAvg,$yearId,$termId,$streamId);
        $drawingAndDesignSubjectRemarks = drawingAndDesignSubjectRemarks($drawingAndDesignAvg,$yearId,$termId,$streamId);
        $frenchSubjectRemarks = frenchSubjectRemarks($frenchAvg,$yearId,$termId,$streamId);
        $germanSubjectRemarks = germanSubjectRemarks($germanAvg,$yearId,$termId,$streamId);
        $arabicSubjectRemarks = arabicSubjectRemarks($arabicAvg,$yearId,$termId,$streamId);
        $signLanguageSubjectRemarks = signLanguageSubjectRemarks($signLanguageAvg,$yearId,$termId,$streamId);
        $musicSubjectRemarks = musicSubjectRemarks($musicAvg,$yearId,$termId,$streamId);
        $woodWorkSubjectRemarks = woodWorkSubjectRemarks($woodWorkAvg,$yearId,$termId,$streamId);
        $metalWorkSubjectRemarks = metalWorkSubjectRemarks($metalWorkAvg,$yearId,$termId,$streamId);
        $buildingAndConstructionSubjectRemarks = buildingAndConstructionSubjectRemarks($buildingConstructionAvg,$yearId,$termId,$streamId);
        $powerAndMechanicsSubjectRemarks = powerAndMechanicsSubjectRemarks($powerMechanicsAvg,$yearId,$termId,$streamId);
        $electricitySubjectRemarks = electricitySubjectRemarks($electricityAvg,$yearId,$termId,$streamId);
        $aviationAndTechnologySubjectRemarks = aviationAndTechnologySubjectRemarks($aviationTechnologyAvg,$yearId,$termId,$streamId);
        // End of remarks in each subject based on the performance

        //Beginning of stream facilitators (Teachers assigned to every subject in a stream)
        $streamMathematicsTeacher = streamMathematicsTeacher($streamId);
        $streamEnglishTeacher = streamEnglishTeacher($streamId);
        $streamKiswahiliTeacher = streamKiswahiliTeacher($streamId);
        $streamChemistryTeacher = streamChemistryTeacher($streamId);
        $streamBiologyTeacher = streamBiologyTeacher($streamId);
        $streamPhysicsTeacher = streamPhysicsTeacher($streamId);
        $streamCRETeacher = streamCRETeacher($streamId);
        $streamIslamTeacher = streamIslamTeacher($streamId);
        $streamHistoryAndGovernmentTeacher = streamHistoryAndGovernmentTeacher($streamId);
        $streamGeographyTeacher = streamGeographyTeacher($streamId);
        $streamHomeScienceTeacher = streamHomeScienceTeacher($streamId);
        $streamArtAndDesignTeacher = streamArtAndDesignTeacher($streamId);
        $streamAgricultureTeacher = streamAgricultureTeacher($streamId);
        $streamBusinessStudiesTeacher = streamBusinessStudiesTeacher($streamId);
        $streamComputerStudiesTeacher = streamComputerStudiesTeacher($streamId);
        $streamDrawingAndDesignTeacher = streamDrawingAndDesignTeacher($streamId);
        $streamFrenchTeacher = streamFrenchTeacher($streamId);
        $streamGermanTeacher = streamGermanTeacher($streamId);
        $streamArabicTeacher = streamArabicTeacher($streamId);
        $streamSignLanguageTeacher = streamSignLanguageTeacher($streamId);
        $streamMusicTeacher = streamMusicTeacher($streamId);
        $streamWoodWorkTeacher = streamWoodWorkTeacher($streamId);
        $streamMetalWorkTeacher = streamMetalWorkTeacher($streamId);
        $streamBuildingConstructionTeacher = streamBuildingConstructionTeacher($streamId);
        $streamPowerMechanicsTeacher = streamPowerMechanicsTeacher($streamId);
        $streamElectricityTeacher = streamElectricityTeacher($streamId);
        $streamAviationTechnologyTeacher = streamAviationTechnologyTeacher($streamId);
        //End of stream facilitators

        //Start of Exams Totals
        $examOneTotal = $examOneMark->total;
        $examTwoTotal = $examTwoMark->total;
        $examThreeTotal = $examThreeMark->total;
        $overalTotal = collect([$examOneTotal,$examTwoTotal,$examThreeTotal]);
        $overalTotalAvg = $overalTotal->avg();

        //Start of overal class ranking
        $totals = collect(session()->get("clsT"));
        $classTotals = $totals->pluck('mark_total','name');
        $classPositions = $classTotals->toArray();
        $classRankings = array();
        arsort($classPositions);
        $rank = 1;
        $tie_rank = 0;
        $prev_score = -1;
        foreach($classPositions as $mark_total => $score){
            if($score != $prev_score){
                //this score is not a tie
                $count = 0;
                $prev_score = $score;
                $classRankings[$mark_total] = array('score' => $score,'rank'=>$rank);
            } else {
                //this is a tie
                $prev_score = $score;
                if($count++ == 0){
                    $tie_rank = $rank - 1;
                }
                $classRankings[$mark_total] = array('score'=>$score,'rank'=>$tie_rank);
            }
            $rank++;
        }

        $classRankings; 
        $clasPositions = collect($classRankings); //End of Overal Class Ranking
        //Get Overal Position
        $overalPosition = overalPosition($classRankings,$markName);

        //Start of Stream ranking
        $stTotals = collect(session()->get("strmT"));
        $streamTotals = $stTotals->pluck('mark_total','name');
        $streamPositions = $streamTotals->toArray();
        $streamRankings = array();
        arsort($streamPositions);
        $rank = 1;
        $tie_rank = 0;
        $prev_score = -1;
        foreach($streamPositions as $mark_total => $score){
            if($score != $prev_score){
                //this score is not a tie
                $count = 0;
                $prev_score = $score;
                $streamRankings[$mark_total] = array('score' => $score,'rank'=>$rank);
            } else {
                //this is a tie
                $prev_score = $score;
                if($count++ == 0){
                    $tie_rank = $rank - 1;
                }
                $streamRankings[$mark_total] = array('score'=>$score,'rank'=>$tie_rank);
            }
            $rank++;
        }
        $streamRankings; 
        $strmPositions = collect($streamRankings); //End of Stream Ranking
        //Get Stream Position
        $streamPosition = streamPosition($streamRankings,$markName);
        
        $school = auth()->user()->school;
        $title = "Student Report Card";
        $downloadTitle = $school->name." "."-"." ".ucwords($name)." ".$year->year." ".$term->name." "."Report Card";

        // Exam One Subject Grades
        $examOneMathsGrade = examOneMathsGrade($examOneMark,$markName);
        $examOneEnglishGrade = examOneEnglishGrade($examOneMark,$markName);
        $examOneKiswGrade = examOneKiswahiliGrade($examOneMark,$markName);
        $examOneChemGrade = examOneChemistryGrade($examOneMark,$markName);
        $examOneBioGrade = examOneBiologyGrade($examOneMark,$markName);
        $examOnePhysicsGrade = examOnePhysicsGrade($examOneMark,$markName);
        $examOneCREGrade = examOneCREGrade($examOneMark,$markName);
        $examOneIslamGrade = examOneIslamGrade($examOneMark,$markName);
        $examOneHistoryAndGovernmentGrade = examOneHistoryAndGovernmentGrade($examOneMark,$markName);
        $examOneGeographyGrade = examOneGeographyGrade($examOneMark,$markName);
        $examOneHomeScienceGrade = examOneHomeScienceGrade($examOneMark,$markName);
        $examOneArtAndDesignGrade = examOneArtAndDesignGrade($examOneMark,$markName);
        $examOneAgricultureGrade = examOneAgricultureGrade($examOneMark,$markName);
        $examOneBusinessStudiesGrade = examOneBusinessStudiesGrade($examOneMark,$markName);
        $examOneComputerStudiesGrade = examOneComputerStudiesGrade($examOneMark,$markName);
        $examOneDrawingAndDesignGrade = examOneDrawingAndDesignGrade($examOneMark,$markName);
        $examOneFrenchGrade = examOneFrenchGrade($examOneMark,$markName);
        $examOneGermanGrade = examOneGermanGrade($examOneMark,$markName);
        $examOneArabicGrade = examOneArabicGrade($examOneMark,$markName);
        $examOneSignLanguageGrade = examOneSignLanguageGrade($examOneMark,$markName);
        $examOneMusicGrade = examOneMusicGrade($examOneMark,$markName);
        $examOneWoodWorkGrade = examOneWoodWorkGrade($examOneMark,$markName);
        $examOneMetalWorkGrade = examOneMetalWorkGrade($examOneMark,$markName);
        $examOneBuildingConstructionGrade = examOneBuildingConstructionGrade($examOneMark,$markName);
        $examOnePowerMechanicsGrade = examOnePowerMechanicsGrade($examOneMark,$markName);
        $examOneElectricityGrade = examOneElectricityGrade($examOneMark,$markName);
        $examOneAviationTechnologyGrade = examOneAviationTechnologyGrade($examOneMark,$markName);

        // Exam Two Subject Grades
        $examTwoMathsGrade = examTwoMathsGrade($examTwoMark,$markName);
        $examTwoEnglishGrade = examTwoEnglishGrade($examTwoMark,$markName);
        $examTwoKiswGrade = examTwoKiswahiliGrade($examTwoMark,$markName);
        $examTwoChemGrade = examTwoChemistryGrade($examTwoMark,$markName);
        $examTwoBioGrade = examTwoBiologyGrade($examTwoMark,$markName);
        $examTwoPhysicsGrade = examTwoPhysicsGrade($examTwoMark,$markName);
        $examTwoCREGrade = examTwoCREGrade($examTwoMark,$markName);
        $examTwoIslamGrade = examTwoIslamGrade($examTwoMark,$markName);
        $examTwoHistoryAndGovernmentGrade = examTwoHistoryAndGovernmentGrade($examTwoMark,$markName);
        $examTwoGeographyGrade = examTwoGeographyGrade($examTwoMark,$markName);
        $examTwoHomeSciencegGrade = examTwoHomeSciencegGrade($examTwoMark,$markName);
        $examTwoArtAndDesignGrade = examTwoArtAndDesignGrade($examTwoMark,$markName);
        $examTwoAgricultureGrade = examTwoAgricultureGrade($examTwoMark,$markName);
        $examTwoBusinessStudiesGrade = examTwoBusinessStudiesGrade($examTwoMark,$markName);
        $examTwoComputerStudiesGrade = examTwoComputerStudiesGrade($examTwoMark,$markName);
        $examTwoDrawingAndDesignGrade = examTwoDrawingAndDesignGrade($examTwoMark,$markName);
        $examTwoFrenchGrade = examTwoFrenchGrade($examTwoMark,$markName);
        $examTwoGermanGrade = examTwoGermanGrade($examTwoMark,$markName);
        $examTwoArabicGrade = examTwoArabicGrade($examTwoMark,$markName);
        $examTwoSignLanguageGrade = examTwoSignLanguageGrade($examTwoMark,$markName);
        $examTwoMusicGrade = examTwoMusicGrade($examTwoMark,$markName);
        $examTwoWoodWorkGrade = examTwoWoodWorkGrade($examTwoMark,$markName);
        $examTwoMetalWorkGrade = examTwoMetalWorkGrade($examTwoMark,$markName);
        $examTwoBuildingConstructionGrade = examTwoBuildingConstructionGrade($examTwoMark,$markName);
        $examTwoPowerMechanicsGrade = examTwoPowerMechanicsGrade($examTwoMark,$markName);
        $examTwoElectricityGrade = examTwoElectricityGrade($examTwoMark,$markName);
        $examTwoAviationTechnologyGrade = examTwoAviationTechnologyGrade($examTwoMark,$markName);

        // Exam Three Subject Grades
        $examThreeMathsGrade = examThreeMathsGrade($examThreeMark,$markName);
        $examThreeEnglishGrade = examThreeEnglishGrade($examThreeMark,$markName);
        $examThreeKiswGrade = examThreeKiswahiliGrade($examThreeMark,$markName);
        $examThreeChemGrade = examThreeChemistryGrade($examThreeMark,$markName);
        $examThreeBioGrade = examThreeBiologyGrade($examThreeMark,$markName);
        $examThreePhysicsGrade = examThreePhysicsGrade($examThreeMark,$markName);
        $examThreeCREGrade = examThreeCREGrade($examThreeMark,$markName);
        $examThreeIslamGrade = examThreeIslamGrade($examThreeMark,$markName);
        $examThreeHistoryAndGovernmentGrade = examThreeHistoryAndGovernmentGrade($examThreeMark,$markName);
        $examThreeGeographyGrade = examThreeGeographyGrade($examThreeMark,$markName);
        $examThreeHomeScienceGrade = examThreeHomeScienceGrade($examThreeMark,$markName);
        $examThreeArtAndDesignGrade = examThreeArtAndDesignGrade($examThreeMark,$markName);
        $examThreeAgricultureGrade = examThreeAgricultureGrade($examThreeMark,$markName);
        $examThreeBusinessStudiesGrade = examThreeBusinessStudiesGrade($examThreeMark,$markName);
        $examThreeComputerStudiesGrade = examThreeComputerStudiesGrade($examThreeMark,$markName);
        $examThreeDrawingAndDesignGrade = examThreeDrawingAndDesignGrade($examThreeMark,$markName);
        $examThreeFrenchGrade = examThreeFrenchGrade($examThreeMark,$markName);
        $examThreeGermanGrade = examThreeGermanGrade($examThreeMark,$markName);
        $examThreeArabicGrade = examThreeArabicGrade($examThreeMark,$markName);
        $examThreeSignLanguageGrade = examThreeSignLanguageGrade($examThreeMark,$markName);
        $examThreeMusicGrade = examThreeMusicGrade($examThreeMark,$markName);
        $examThreeWoodWorkGrade = examThreeWoodWorkGrade($examThreeMark,$markName);
        $examThreeMetalWorkGrade = examThreeMetalWorkGrade($examThreeMark,$markName);
        $examThreeBuildingConstructionGrade = examThreeBuildingConstructionGrade($examThreeMark,$markName);
        $examThreePowerMechanicsGrade = examThreePowerMechanicsGrade($examThreeMark,$markName);
        $examThreeElectricityGrade = examThreeElectricityGrade($examThreeMark,$markName);
        $examThreeAviationTechnologyGrade = examThreeAviationTechnologyGrade($examThreeMark,$markName);

        //Perform Cumulative Subjects Grade Points
        //Get Maths GPA 
        $examOneMathsGradePoints = examOneMathsGradePoints($examOneMark,$markName);
        $examTwoMathsGradePoints = examTwoMathsGradePoints($examTwoMark,$markName);
        $examThreeMathsGradePoints = examThreeMathsGradePoints($examThreeMark,$markName);
        $mathsCumulativePoints = Stat::mean([$examOneMathsGradePoints,$examTwoMathsGradePoints,$examThreeMathsGradePoints]);
        //Get English GPA 
        $examOneEnglishGradePoints = examOneEnglishGradePoints($examOneMark,$markName);
        $examTwoEnglishGradePoints = examTwoEnglishGradePoints($examTwoMark,$markName);
        $examThreeEnglishGradePoints = examThreeEnglishGradePoints($examThreeMark,$markName);
        $englishCumulativePoints = Stat::mean([$examOneEnglishGradePoints,$examTwoEnglishGradePoints,$examThreeEnglishGradePoints]);
        //Get Kiswahili GPA 
        $examOneKiswahiliGradePoints = examOneKiswahiliGradePoints($examOneMark,$markName);
        $examTwoKiswahiliGradePoints = examTwoKiswahiliGradePoints($examTwoMark,$markName);
        $examThreeKiswahiliGradePoints = examThreeKiswahiliGradePoints($examThreeMark,$markName);
        $kiswCumulativePoints = Stat::mean([$examOneKiswahiliGradePoints,$examTwoKiswahiliGradePoints,$examThreeKiswahiliGradePoints]);
        //Get Chemistry GPA 
        $examOneChemGradePoints = examOneChemistryGradePoints($examOneMark,$markName);
        $examTwoChemGradePoints = examTwoChemistryGradePoints($examTwoMark,$markName);
        $examThreeChemGradePoints = examThreeChemistryGradePoints($examThreeMark,$markName);
        $chemCumulativePoints = Stat::mean([$examOneChemGradePoints,$examTwoChemGradePoints,$examThreeChemGradePoints]);
        //Get Biology GPA 
        $examOneBioGradePoints = examOneBiologyGradePoints($examOneMark,$markName);
        $examTwoBioGradePoints = examTwoBiologyGradePoints($examTwoMark,$markName);
        $examThreeBioGradePoints = examThreeBiologyGradePoints($examThreeMark,$markName);
        $bioCumulativePoints = Stat::mean([$examOneBioGradePoints,$examTwoBioGradePoints,$examThreeBioGradePoints]);
        //Get Physics GPA 
        $examOnePhysicsGradePoints = examOnePhysicsGradePoints($examOneMark,$markName);
        $examTwoPhysicsGradePoints = examTwoPhysicsGradePoints($examTwoMark,$markName);
        $examThreePhysicsGradePoints = examThreePhysicsGradePoints($examThreeMark,$markName);
        $physicsCumulativePoints = Stat::mean([$examOnePhysicsGradePoints,$examTwoPhysicsGradePoints,$examThreePhysicsGradePoints]);
        //Get CRE GPA 
        $examOneCREGradePoints = examOneCREGradePoints($examOneMark,$markName);
        $examTwoCREGradePoints = examTwoCREGradePoints($examTwoMark,$markName);
        $examThreeCREGradePoints = examThreeCREGradePoints($examThreeMark,$markName);
        $creCumulativePoints = Stat::mean([$examOneCREGradePoints,$examTwoCREGradePoints,$examThreeCREGradePoints]);
        //Get Islam GPA 
        $examOneIslamGradePoints = examOneIslamGradePoints($examOneMark,$markName);
        $examTwoIslamGradePoints = examTwoIslamGradePoints($examTwoMark,$markName);
        $examThreeIslamGradePoints = examThreeIslamGradePoints($examThreeMark,$markName);
        $islamCumulativePoints = Stat::mean([$examOneIslamGradePoints,$examTwoIslamGradePoints,$examThreeIslamGradePoints]);
        //Get History GPA 
        $examOneHistotyAndGovernmentGradePoints = examOneHistotyAndGovernmentGradePoints($examOneMark,$markName);
        $examTwoHistoryAndGovernmentGradePoints = examTwoHistoryAndGovernmentGradePoints($examTwoMark,$markName);
        $examThreeHistoryAndGovermentGradePoints = examThreeHistoryAndGovermentGradePoints($examThreeMark,$markName);
        $historyAndGovernmentCumulativePoints = Stat::mean([$examOneHistotyAndGovernmentGradePoints,$examTwoHistoryAndGovernmentGradePoints,$examThreeHistoryAndGovermentGradePoints]);
        //Get Geog GPA 
        $examOneGeographyGradePoints = examOneGeographyGradePoints($examOneMark,$markName);
        $examTwoGeographyGradePoints = examTwoGeographyGradePoints($examTwoMark,$markName);
        $examThreeGeographyGradePoints = examThreeGeographyGradePoints($examThreeMark,$markName);
        $geographyCumulativePoints = Stat::mean([$examOneGeographyGradePoints,$examTwoGeographyGradePoints,$examThreeGeographyGradePoints]);
        //Get Home Science GPA
        $examOneHomeScienceGradePoints = examOneHomeScienceGradePoints($examOneMark,$markName);
        $examTwoHomeScienceGradePoints = examTwoHomeScienceGradePoints($examTwoMark,$markName);
        $examThreeHomeScienceGradePoints = examThreeHomeScienceGradePoints($examThreeMark,$markName);
        $homeScienceCumulativePoints = Stat::mean([$examOneHomeScienceGradePoints,$examTwoHomeScienceGradePoints,$examThreeHomeScienceGradePoints]);
        //Get Art And Design GPA
        $examOneArtAndDesignGradePoints = examOneArtAndDesignGradePoints($examOneMark,$markName);
        $examTwoArtAndDesignGradePoints = examTwoArtAndDesignGradePoints($examTwoMark,$markName);
        $examThreeArtAndDesignGradePoints = examThreeArtAndDesignGradePoints($examThreeMark,$markName);
        $artAndDesignCumulativePoints = Stat::mean([$examOneArtAndDesignGradePoints,$examTwoArtAndDesignGradePoints,$examThreeArtAndDesignGradePoints]);
        //Get Agriculture GPA
        $examOneAgricultureGradePoints = examOneAgricultureGradePoints($examOneMark,$markName);
        $examTwoAgricultureGradePoints = examTwoAgricultureGradePoints($examTwoMark,$markName);
        $examThreeAgricultureGradePoints = examThreeAgricultureGradePoints($examThreeMark,$markName);
        $agricCumulativePoints = Stat::mean([$examOneAgricultureGradePoints,$examTwoAgricultureGradePoints,$examThreeAgricultureGradePoints]);
        //Get Business Studies GPA
        $examOneBusinessStudiesGradePoints = examOneBusinessStudiesGradePoints($examOneMark,$markName);
        $examTwoBusinessStudiesGradePoints = examTwoBusinessStudiesGradePoints($examTwoMark,$markName);
        $examThreeBusinessStudiesGradePoints = examThreeBusinessStudiesGradePoints($examThreeMark,$markName);
        $businessStudiesCumulativePoints = Stat::mean([$examOneBusinessStudiesGradePoints,$examTwoBusinessStudiesGradePoints,$examThreeBusinessStudiesGradePoints]);
        //Get Computer Studies GPA
        $examOneComputerStudiesGradePoints = examOneComputerStudiesGradePoints($examOneMark,$markName);
        $examTwoComputerStudiesGradePoints = examTwoComputerStudiesGradePoints($examTwoMark,$markName);
        $examThreeComputerStudiesGradePoints = examThreeComputerStudiesGradePoints($examThreeMark,$markName);
        $computerStudiesCumulativePoints = Stat::mean([$examOneComputerStudiesGradePoints,$examTwoComputerStudiesGradePoints,$examThreeComputerStudiesGradePoints]);
        //Get Drawing And Design GPA
        $examOneDrawingAndDesignGradePoints = examOneDrawingAndDesignGradePoints($examOneMark,$markName);
        $examTwoDrawingAndDesignGradePoints = examTwoDrawingAndDesignGradePoints($examTwoMark,$markName);
        $examThreeDrawingAndDesignGradePoints = examThreeDrawingAndDesignGradePoints($examThreeMark,$markName);
        $drawingAndDesignCumulativePoints = Stat::mean([$examOneDrawingAndDesignGradePoints,$examTwoDrawingAndDesignGradePoints,$examThreeDrawingAndDesignGradePoints]);
        //Get French GPA
        $examOneFrenchGradePoints = examOneFrenchGradePoints($examOneMark,$markName);
        $examTwoFrenchGradePoints = examTwoFrenchGradePoints($examTwoMark,$markName);
        $examThreeFrenchGradePoints = examThreeFrenchGradePoints($examThreeMark,$markName);
        $frenchCumulativePoints = Stat::mean([$examOneFrenchGradePoints,$examTwoFrenchGradePoints,$examThreeFrenchGradePoints]);
        //Get German GPA
        $examOneGermanGradePoints = examOneGermanGradePoints($examOneMark,$markName);
        $examTwoGermanGradePoints = examTwoGermanGradePoints($examTwoMark,$markName);
        $examThreeGermanGradePoints = examThreeGermanGradePoints($examThreeMark,$markName);
        $germanCumulativePoints = Stat::mean([$examOneGermanGradePoints,$examTwoGermanGradePoints,$examThreeGermanGradePoints]);
        //Get Arabic GPA
        $examOneArabicGradePoints = examOneArabicGradePoints($examOneMark,$markName);
        $examTwoArabicGradePoints = examTwoArabicGradePoints($examTwoMark,$markName);
        $examThreeArabicGradePoints = examThreeArabicGradePoints($examThreeMark,$markName);
        $arabicCumulativePoints = Stat::mean([$examOneArabicGradePoints,$examTwoArabicGradePoints,$examThreeArabicGradePoints]);
        //Get Sign Language GPA
        $examOneSignLanguageGradePoints = examOneSignLanguageGradePoints($examOneMark,$markName);
        $examTwoSignLanguageGradePoints = examTwoSignLanguageGradePoints($examTwoMark,$markName);
        $examThreeSignLanguageGradePoints = examThreeSignLanguageGradePoints($examThreeMark,$markName);
        $signLanguageCumulativePoints = Stat::mean([$examOneSignLanguageGradePoints,$examTwoSignLanguageGradePoints,$examThreeSignLanguageGradePoints]);
        //Get Music GPA
        $examOneMusicGradePoints = examOneMusicGradePoints($examOneMark,$markName);
        $examTwoMusicGradePoints = examTwoMusicGradePoints($examTwoMark,$markName);
        $examThreeMusicGradePoints = examThreeMusicGradePoints($examThreeMark,$markName);
        $musicCumulativePoints = Stat::mean([$examOneMusicGradePoints,$examTwoMusicGradePoints,$examThreeMusicGradePoints]);
        //Get Wood Work GPA
        $examOneWoodWorkGradePoints = examOneWoodWorkGradePoints($examOneMark,$markName);
        $examTwoWoodWorkGradePoints = examTwoWoodWorkGradePoints($examTwoMark,$markName);
        $examThreeWoodWorkGradePoints = examThreeWoodWorkGradePoints($examThreeMark,$markName);
        $woodWorkCumulativePoints = Stat::mean([$examOneWoodWorkGradePoints,$examTwoWoodWorkGradePoints,$examThreeWoodWorkGradePoints]);
        //Get Metal Work GPA
        $examOneMetalWorkgGradePoints = examOneMetalWorkgGradePoints($examOneMark,$markName);
        $examTwoMetalWorkGradePoints = examTwoMetalWorkGradePoints($examTwoMark,$markName);
        $examThreeMetalWorkGradePoints = examThreeMetalWorkGradePoints($examThreeMark,$markName);
        $metaWorkCumulativePoints = Stat::mean([$examOneMetalWorkgGradePoints,$examTwoMetalWorkGradePoints,$examThreeMetalWorkGradePoints]);
        //Get Building And Contruction GPA
        $examOneBuildingConstructionGradePoints = examOneBuildingConstructionGradePoints($examOneMark,$markName);
        $examTwoBuildingConstructionGradePoints = examTwoBuildingConstructionGradePoints($examTwoMark,$markName);
        $examThreeBuildingConstructionGradePoints = examThreeBuildingConstructionGradePoints($examThreeMark,$markName);
        $buildingConstructionCumulativePoints = Stat::mean([$examOneBuildingConstructionGradePoints,$examTwoBuildingConstructionGradePoints,$examThreeBuildingConstructionGradePoints]);
        //Get Power Mechanics GPA
        $examOnePowerMechanicsGradePoints = examOnePowerMechanicsGradePoints($examOneMark,$markName);
        $examTwoPowerMechanicsGradePoints = examTwoPowerMechanicsGradePoints($examTwoMark,$markName);
        $examThreePowerMechanicsGradePoints = examThreePowerMechanicsGradePoints($examThreeMark,$markName);
        $powerMechanicsCumulativePoints = Stat::mean([$examOnePowerMechanicsGradePoints,$examTwoPowerMechanicsGradePoints,$examThreePowerMechanicsGradePoints]);
        //Get Electricity GPA
        $examOneElectricitygGradePoints = examOneElectricitygGradePoints($examOneMark,$markName);
        $examTwoElectricityGradePoints = examTwoElectricityGradePoints($examTwoMark,$markName);
        $examThreeElectricityGradePoints = examThreeElectricityGradePoints($examThreeMark,$markName);
        $electricityCumulativePoints = Stat::mean([$examOneElectricitygGradePoints,$examTwoElectricityGradePoints,$examThreeElectricityGradePoints]);
        //Get Aviation Technology GPA
        $examOneAviationTechnologyGradePoints = examOneAviationTechnologyGradePoints($examOneMark,$markName);
        $examTwoAviationTechnologyGradePoints = examTwoAviationTechnologyGradePoints($examTwoMark,$markName);
        $examThreeAviationTechnologyGradePoints = examThreeAviationTechnologyGradePoints($examThreeMark,$markName);
        $aviationTechnologyCumulativePoints = Stat::mean([$examOneAviationTechnologyGradePoints,$examTwoAviationTechnologyGradePoints,$examThreeAviationTechnologyGradePoints]);

        $totalCumulativePoints = collect([$mathsCumulativePoints,$englishCumulativePoints,$kiswCumulativePoints,$chemCumulativePoints,$bioCumulativePoints,$physicsCumulativePoints,$creCumulativePoints,$islamCumulativePoints,$historyAndGovernmentCumulativePoints,$geographyCumulativePoints,$homeScienceCumulativePoints,$artAndDesignCumulativePoints,$agricCumulativePoints,$businessStudiesCumulativePoints,$computerStudiesCumulativePoints,$drawingAndDesignCumulativePoints,$frenchCumulativePoints,$germanCumulativePoints,$arabicCumulativePoints,$signLanguageCumulativePoints,$musicCumulativePoints,$woodWorkCumulativePoints,$metaWorkCumulativePoints,$buildingConstructionCumulativePoints,$powerMechanicsCumulativePoints,$electricityCumulativePoints,$aviationTechnologyCumulativePoints])->sum();

        // Number of subjects taken in a stream
        $subjectsTakenPerStream = $stream->class->number_of_subjects_per_class;

        //Constant out of marks
        $outOfMarksConstant = $mark->out_of;
        
        $cumulativePointsAvg = $totalCumulativePoints/$subjectsTakenPerStream;
        
        //Overal GPA (Addition of all Cumulative Points Devide by Number of Units/Subjects Taken by the Student)
        $overalGPA = round($cumulativePointsAvg,1);

        //General Grade Each Exam
        $examOneGenGrade = examOneGeneralGrade($examOneMark,$examOne,$examOneTotal);
        $examTwoGenGrade = examTwoGeneralGrade($examTwoMark,$examTwo,$examTwoTotal);
        $examThreeGenGrade = examThreeGeneralGrade($examThreeMark,$examThree,$examThreeTotal);
        //General Report Card Remark
        $reportGeneralRemark = reportGeneralRemark($yearId,$termId,$stream,$year,$term,$overalTotalAvg);
        //Report Card Subject Average Grades
        $reportSubjectGrades = ReportSubjectGrade::with('year','term','subject')->where(['term_id'=>$termId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        //Report Card General Grades
        $reportMeanGrades = ReportMeanGrade::with('year','term')->where(['term_id'=>$termId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        $streamStudents = $stream->students()->with('school','libraries','teachers','stream','clubs','payments','payment_records','marks','user')->get();

        $data = [
            'school' => $school,
            'title' => $title,
            'examOne' => $examOne,
            'examTwo' => $examTwo,
            'examThree' => $examThree,
            'examOneMark' => $examOneMark,
            'examTwoMark' => $examTwoMark,
            'examThreeMark' => $examThreeMark,

            //Average Marks of each subject
            'mathsAvg' => $mathsAvg,
            'engAvg' => $engAvg,
            'kiswAvg' => $kiswAvg,
            'chemAvg' => $chemAvg,
            'bioAvg' => $bioAvg,
            'physicsAvg' => $physicsAvg,
            'creAvg' => $creAvg,
            'islamAvg' => $islamAvg,
            'histAndGovernmentAvg' => $histAndGovernmentAvg,
            'geogAvg' => $geogAvg,
            'homeScienceAvg' => $homeScienceAvg,
            'artAndDesignAvg' => $artAndDesignAvg,
            'agricultureAvg' => $agricultureAvg,
            'businessStudiesAvg' => $businessStudiesAvg,
            'computerStudiesAvg' => $computerStudiesAvg,
            'drawingAndDesignAvg' => $drawingAndDesignAvg,
            'frenchAvg' => $frenchAvg,
            'germanAvg' => $germanAvg,
            'arabicAvg' => $arabicAvg,
            'signLanguageAvg' => $signLanguageAvg,
            'musicAvg' => $musicAvg,
            'woodWorkAvg' => $woodWorkAvg,
            'metalWorkAvg' => $metalWorkAvg,
            'buildingConstructionAvg' => $buildingConstructionAvg,
            'powerMechanicsAvg' => $powerMechanicsAvg,
            'electricityAvg' => $electricityAvg,
            'aviationTechnologyAvg' => $aviationTechnologyAvg,
            //End of the average marks of each subject

            'year' => $year,
            'term' => $term,
            'overalTotalAvg' => $overalTotalAvg,
            'openingDate' => $openingDate,
            'closingDate' => $closingDate,
            'overalPosition' => $overalPosition,
            'streamPosition' => $streamPosition,
            'stream' => $stream,
            'examOneTotal' => $examOneTotal,
            'examTwoTotal' => $examTwoTotal,
            'examThreeTotal' => $examThreeTotal,
            'name' => $name,
            'markName' => $markName,

            //Exam One Suject Grades
            'examOneMathsGrade' => $examOneMathsGrade,
            'examOneEnglishGrade' => $examOneEnglishGrade,
            'examOneKiswGrade' => $examOneKiswGrade,
            'examOneChemGrade' => $examOneChemGrade,
            'examOneBioGrade' => $examOneBioGrade,
            'examOnePhysicsGrade' => $examOnePhysicsGrade,
            'examOneCREGrade' => $examOneCREGrade,
            'examOneIslamGrade' => $examOneIslamGrade,
            'examOneHistoryAndGovernmentGrade' => $examOneHistoryAndGovernmentGrade,
            'examOneGeographyGrade' => $examOneGeographyGrade,
            'examOneHomeScienceGrade' => $examOneHomeScienceGrade,
            'examOneArtAndDesignGrade' => $examOneArtAndDesignGrade,
            'examOneAgricultureGrade' => $examOneAgricultureGrade,
            'examOneBusinessStudiesGrade' => $examOneBusinessStudiesGrade,
            'examOneComputerStudiesGrade' => $examOneComputerStudiesGrade,
            'examOneDrawingAndDesignGrade' => $examOneDrawingAndDesignGrade,
            'examOneFrenchGrade' => $examOneFrenchGrade,
            'examOneGermanGrade' => $examOneGermanGrade,
            'examOneArabicGrade' => $examOneArabicGrade,
            'examOneSignLanguageGrade' => $examOneSignLanguageGrade,
            'examOneMusicGrade' => $examOneMusicGrade,
            'examOneWoodWorkGrade' => $examOneWoodWorkGrade,
            'examOneMetalWorkGrade' => $examOneMetalWorkGrade,
            'examOneBuildingConstructionGrade' => $examOneBuildingConstructionGrade,
            'examOnePowerMechanicsGrade' => $examOnePowerMechanicsGrade,
            'examOneElectricityGrade' => $examOneElectricityGrade,
            'examOneAviationTechnologyGrade' => $examOneAviationTechnologyGrade,

            //Exam Two Subject Grades
            'examTwoMathsGrade' => $examTwoMathsGrade,
            'examTwoEnglishGrade' => $examTwoEnglishGrade,
            'examTwoKiswGrade' => $examTwoKiswGrade,
            'examTwoChemGrade' => $examTwoChemGrade,
            'examTwoBioGrade' => $examTwoBioGrade,
            'examTwoPhysicsGrade' => $examTwoPhysicsGrade,
            'examTwoCREGrade' => $examTwoCREGrade,
            'examTwoIslamGrade' => $examTwoIslamGrade,
            'examTwoHistoryAndGovernmentGrade' => $examTwoHistoryAndGovernmentGrade,
            'examTwoGeographyGrade' => $examTwoGeographyGrade,
            'examTwoHomeSciencegGrade' => $examTwoHomeSciencegGrade,
            'examTwoArtAndDesignGrade' => $examTwoArtAndDesignGrade,
            'examTwoAgricultureGrade' => $examTwoAgricultureGrade,
            'examTwoBusinessStudiesGrade' => $examTwoBusinessStudiesGrade,
            'examTwoComputerStudiesGrade' => $examTwoComputerStudiesGrade,
            'examTwoDrawingAndDesignGrade' => $examTwoDrawingAndDesignGrade,
            'examTwoFrenchGrade' => $examTwoFrenchGrade,
            'examTwoGermanGrade' => $examTwoGermanGrade,
            'examTwoArabicGrade' => $examTwoArabicGrade,
            'examTwoSignLanguageGrade' => $examTwoSignLanguageGrade,
            'examTwoMusicGrade' => $examTwoMusicGrade,
            'examTwoMusicGrade' => $examTwoMusicGrade,
            'examTwoWoodWorkGrade' => $examTwoWoodWorkGrade,
            'examTwoMetalWorkGrade' => $examTwoMetalWorkGrade,
            'examTwoPowerMechanicsGrade' => $examTwoPowerMechanicsGrade,
            'examTwoElectricityGrade' => $examTwoElectricityGrade,
            'examTwoAviationTechnologyGrade' => $examTwoAviationTechnologyGrade,

            //Exam Three Subject Grades
            'examThreeMathsGrade' => $examThreeMathsGrade,
            'examThreeEnglishGrade' => $examThreeEnglishGrade,
            'examThreeKiswGrade' => $examThreeKiswGrade,
            'examThreeChemGrade' => $examThreeChemGrade,
            'examThreeBioGrade' => $examThreeBioGrade,
            'examThreePhysicsGrade' => $examThreePhysicsGrade,
            'examThreeCREGrade' => $examThreeCREGrade,
            'examThreeIslamGrade' => $examThreeIslamGrade,
            'examThreeHistoryAndGovernmentGrade' => $examThreeHistoryAndGovernmentGrade,
            'examThreeGeographyGrade' => $examThreeGeographyGrade,
            'examThreeHomeScienceGrade' => $examThreeHomeScienceGrade,
            'examThreeArtAndDesignGrade' => $examThreeArtAndDesignGrade,
            'examThreeAgricultureGrade' => $examThreeAgricultureGrade,
            'examThreeBusinessStudiesGrade' => $examThreeBusinessStudiesGrade,
            'examThreeComputerStudiesGrade' => $examThreeComputerStudiesGrade,
            'examThreeDrawingAndDesignGrade' => $examThreeDrawingAndDesignGrade,
            'examThreeFrenchGrade' => $examThreeFrenchGrade,
            'examThreeGermanGrade' => $examThreeGermanGrade,
            'examThreeArabicGrade' => $examThreeArabicGrade,
            'examThreeSignLanguageGrade' => $examThreeSignLanguageGrade,
            'examThreeMusicGrade' => $examThreeMusicGrade,
            'examThreeWoodWorkGrade' => $examThreeWoodWorkGrade,
            'examThreeMetalWorkGrade' => $examThreeMetalWorkGrade,
            'examThreeBuildingConstructionGrade' => $examThreeBuildingConstructionGrade,
            'examThreePowerMechanicsGrade' => $examThreePowerMechanicsGrade,
            'examThreeElectricityGrade' => $examThreeElectricityGrade,
            'examThreeAviationTechnologyGrade' => $examThreeAviationTechnologyGrade,
            //End Exam Three Subject Grades

            //Subjects taken in each stream
            'subjectsTakenPerStream' => $subjectsTakenPerStream,

            //Out of marks constant
            'outOfMarksConstant' => $outOfMarksConstant,

            'examOneGenGrade' => $examOneGenGrade,
            'examTwoGenGrade' => $examTwoGenGrade,
            'examThreeGenGrade' => $examThreeGenGrade,
            'overalGPA' => $overalGPA,
            'reportGeneralRemark' => $reportGeneralRemark,
            'mark' => $mark,
            'streamStudents' => $streamStudents,
            'reportSubjectGrades' => $reportSubjectGrades,
            'reportMeanGrades' => $reportMeanGrades,
            'downloadTitle' => $downloadTitle,

            //Beginning of Subject Remarks
            'mathsSubjectRemarks' => $mathsSubjectRemarks,
            'englishSubjectRemarks' => $englishSubjectRemarks,
            'kiswahiliSubjectRemarks' => $kiswahiliSubjectRemarks,
            'chemistrySubjectRemarks' => $chemistrySubjectRemarks,
            'biologySubjectRemarks' => $biologySubjectRemarks,
            'physicsSubjectRemarks' => $physicsSubjectRemarks,
            'creSubjectRemarks' => $creSubjectRemarks,
            'islamSubjectRemarks' => $islamSubjectRemarks,
            'historyAndGovernmentSubjectRemarks' => $historyAndGovernmentSubjectRemarks,
            'geographySubjectRemarks' => $geographySubjectRemarks,
            'homeScienceSubjectRemarks' => $homeScienceSubjectRemarks,
            'artAndDesignSubjectRemarks' => $artAndDesignSubjectRemarks,
            'agricultureSubjectRemarks' => $agricultureSubjectRemarks,
            'businessStudiesSubjectRemarks' => $businessStudiesSubjectRemarks,
            'computerStudiesSubjectRemarks' => $computerStudiesSubjectRemarks,
            'drawingAndDesignSubjectRemarks' => $drawingAndDesignSubjectRemarks,
            'frenchSubjectRemarks' => $frenchSubjectRemarks,
            'germanSubjectRemarks' => $germanSubjectRemarks,
            'arabicSubjectRemarks' => $arabicSubjectRemarks,
            'signLanguageSubjectRemarks' => $signLanguageSubjectRemarks,
            'musicSubjectRemarks' => $musicSubjectRemarks,
            'woodWorkSubjectRemarks' => $woodWorkSubjectRemarks,
            'metalWorkSubjectRemarks' => $metalWorkSubjectRemarks,
            'buildingAndConstructionSubjectRemarks' => $buildingAndConstructionSubjectRemarks,
            'powerAndMechanicsSubjectRemarks' => $powerAndMechanicsSubjectRemarks,
            'electricitySubjectRemarks' => $electricitySubjectRemarks,
            'aviationAndTechnologySubjectRemarks' => $aviationAndTechnologySubjectRemarks,
            //End of Subject Remarks

            //Beginning of Stream Facilitators
            'streamMathematicsTeacher' => $streamMathematicsTeacher,
            'streamEnglishTeacher' => $streamEnglishTeacher,
            'streamKiswahiliTeacher' => $streamKiswahiliTeacher,
            'streamChemistryTeacher' => $streamChemistryTeacher,
            'streamBiologyTeacher' => $streamBiologyTeacher,
            'streamPhysicsTeacher' => $streamPhysicsTeacher,
            'streamCRETeacher' => $streamCRETeacher,
            'streamIslamTeacher' => $streamIslamTeacher,
            'streamHistoryAndGovernmentTeacher' => $streamHistoryAndGovernmentTeacher,
            'streamGeographyTeacher' => $streamGeographyTeacher,
            'streamHomeScienceTeacher' => $streamHomeScienceTeacher,
            'streamArtAndDesignTeacher' => $streamArtAndDesignTeacher,
            'streamAgricultureTeacher' => $streamAgricultureTeacher,
            'streamBusinessStudiesTeacher' => $streamBusinessStudiesTeacher,
            'streamComputerStudiesTeacher' => $streamComputerStudiesTeacher,
            'streamDrawingAndDesignTeacher' => $streamDrawingAndDesignTeacher,
            'streamFrenchTeacher' => $streamFrenchTeacher,
            'streamGermanTeacher' => $streamGermanTeacher,
            'streamArabicTeacher' => $streamArabicTeacher,
            'streamSignLanguageTeacher' => $streamSignLanguageTeacher,
            'streamMusicTeacher' => $streamMusicTeacher,
            'streamWoodWorkTeacher' => $streamWoodWorkTeacher,
            'streamMetalWorkTeacher' => $streamMetalWorkTeacher,
            'streamBuildingConstructionTeacher' => $streamBuildingConstructionTeacher,
            'streamPowerMechanicsTeacher' => $streamPowerMechanicsTeacher,
            'streamElectricityTeacher' => $streamElectricityTeacher,
            'streamAviationTechnologyTeacher' => $streamAviationTechnologyTeacher,
            //End of Stream Facilitators
        ];

        $pdf = PDF::loadView('teacher.pdf.threeexams_reportcard',$data)->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/2);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf',array("Attachment" => 0));
    } 
}
