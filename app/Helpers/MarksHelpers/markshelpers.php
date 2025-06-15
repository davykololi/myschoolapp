<?php

use App\Models\Mark;
use App\Models\Stream;
use App\Models\SubjectRemark;
use App\Models\StreamSubject;
use App\Enums\SubjectsEnum;
use Illuminate\Database\Eloquent\Collection;

function classMarks($yearId,$termId,$examId,$classId)
{
    $classMarks = Mark::with('year','term','exam','student.user','school','teacher','class','stream.stream_section')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get()->sortByDesc('total');

    return $classMarks;
}

function streamMarks($yearId,$termId,$examId,$streamId)
{
    $streamMarks = Mark::with('year','term','exam','student.user','school','teacher','class','stream.stream_section')->where(['term_id'=>$termId,'exam_id'=>$examId,'stream_id'=>$streamId,'year_id'=>$yearId])->get()->sortByDesc('total');

    return $streamMarks;
}

function overalPosition($classRankings,$markName)
{
	foreach($classRankings as $mark_total => $pos){
		if($mark_total === $markName){
			$overalPosition = $pos['rank'];
			return $overalPosition;
		}
	}
}

function streamPosition($streamRankings,$markName)
{
	foreach($streamRankings as $mark_total => $pos){
		if($mark_total === $markName){
			$streamPosition = $pos['rank'];
			return $streamPosition;
		}
	}
}

// Beginning of Report Card Subject Remarks
function subjectRemarks($yearId,$termId,$streamId)
{
    if(!is_null($streamId)){
        $subjectRemarks = SubjectRemark::where(['year_id'=>$yearId,'term_id'=>$termId,'stream_id'=>$streamId,'school_id'=>auth()->user()->school->id])->eagerLoaded()->get();
        
        return $subjectRemarks;
    }
}

function mathsSubjectRemarks($mathsAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::MATHS->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId)&& ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($mathsAvg,0)) && ($subjectRemark->to_mark >= round($mathsAvg,0))){
            $mathsSubjectRemarks = $subjectRemark->remark;

            return $mathsSubjectRemarks;
        }
    }
}

function englishSubjectRemarks($engAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::ENG->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($engAvg,0)) && ($subjectRemark->to_mark >= round($engAvg,0))){
            $englishSubjectRemarks = $subjectRemark->remark;

            return $englishSubjectRemarks;
        }
    }
}

function kiswahiliSubjectRemarks($kiswAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::KISW->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($kiswAvg,0)) && ($subjectRemark->to_mark >= round($kiswAvg,0))){
            $kiswahiliSubjectRemarks = $subjectRemark->remark;

            return $kiswahiliSubjectRemarks;
        }
    }
}

function chemistrySubjectRemarks($chemAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::CHEM->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($chemAvg,0)) && ($subjectRemark->to_mark >= round($chemAvg,0))){
            $chemistrySubjectRemarks = $subjectRemark->remark;

            return $chemistrySubjectRemarks;
        }
    }
}

function biologySubjectRemarks($bioAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::BIO->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($bioAvg,0)) && ($subjectRemark->to_mark >= round($bioAvg,0))){
            $biologySubjectRemarks = $subjectRemark->remark;

            return $biologySubjectRemarks;
        }
    }
}

function physicsSubjectRemarks($physicsAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::PHY->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($physicsAvg,0)) && ($subjectRemark->to_mark >= round($physicsAvg,0))){
            $physicsSubjectRemarks = $subjectRemark->remark;

            return $physicsSubjectRemarks;
        }
    }
}

function creSubjectRemarks($creAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::CRE->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($creAvg,0)) && ($subjectRemark->to_mark >= round($creAvg,0))){
            $creSubjectRemarks = $subjectRemark->remark;

            return $creSubjectRemarks;
        }
    }
}

function islamSubjectRemarks($islamAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::ISLM->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($islamAvg,0)) && ($subjectRemark->to_mark >= round($islamAvg,0))){
            $islamSubjectRemarks = $subjectRemark->remark;

            return $islamSubjectRemarks;
        }
    }
}

function historyAndGovernmentSubjectRemarks($histAndGovernmentAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::HISTANDGOV->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($histAndGovernmentAvg,0)) && ($subjectRemark->to_mark >= round($histAndGovernmentAvg,0))){
            $historySubjectRemarks = $subjectRemark->remark;

            return $historySubjectRemarks;
        }
    }
}

function geographySubjectRemarks($geogAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::GEOG->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($geogAvg,0)) && ($subjectRemark->to_mark >= round($geogAvg,0))){
            $geographySubjectRemarks = $subjectRemark->remark;

            return $geographySubjectRemarks;
        }
    }
}

function homeScienceSubjectRemarks($homeScienceAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::HOMESC->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($homeScienceAvg,0)) && ($subjectRemark->to_mark >= round($homeScienceAvg,0))){
            $homeScienceSubjectRemarks = $subjectRemark->remark;

            return $homeScienceSubjectRemarks;
        }
    }
}

function artAndDesignSubjectRemarks($artAndDesignAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::ARTDSGN->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($artAndDesignAvg,0)) && ($subjectRemark->to_mark >= round($artAndDesignAvg,0))){
            $artAndDesignSubjectRemarks = $subjectRemark->remark;

            return $artAndDesignSubjectRemarks;
        }
    }
}

function agricultureSubjectRemarks($agricultureAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::AGRIC->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($agricultureAvg,0)) && ($subjectRemark->to_mark >= round($agricultureAvg,0))){
            $agricultureSubjectRemarks = $subjectRemark->remark;

            return $agricultureSubjectRemarks;
        }
    }
}

function businessStudiesSubjectRemarks($businessStudiesAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::BUZSTRDS->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($businessStudiesAvg,0)) && ($subjectRemark->to_mark >= round($businessStudiesAvg,0))){
            $businessStudiesSubjectRemarks = $subjectRemark->remark;

            return $businessStudiesSubjectRemarks;
        }
    }
}

function computerStudiesSubjectRemarks($computerStudiesAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::COMPSTRDS->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($computerStudiesAvg,0)) && ($subjectRemark->to_mark >= round($computerStudiesAvg,0))){
            $computerStudiesSubjectRemarks = $subjectRemark->remark;

            return $computerStudiesSubjectRemarks;
        }
    }
}

function drawingAndDesignSubjectRemarks($drawingAndDesignAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::DRWNDGN->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($drawingAndDesignAvg,0)) && ($subjectRemark->to_mark >= round($drawingAndDesignAvg,0))){
            $drawingAndDesignSubjectRemarks = $subjectRemark->remark;

            return $drawingAndDesignSubjectRemarks;
        }
    }
}

function frenchSubjectRemarks($frenchAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::FRNCH->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($frenchAvg,0)) && ($subjectRemark->to_mark >= round($frenchAvg,0))){
            $frenchSubjectRemarks = $subjectRemark->remark;

            return $frenchSubjectRemarks;
        }
    }
}

function germanSubjectRemarks($germanAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::GRMN->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($germanAvg,0)) && ($subjectRemark->to_mark >= round($germanAvg,0))){
            $germanSubjectRemarks = $subjectRemark->remark;

            return $germanSubjectRemarks;
        }
    }
}

function arabicSubjectRemarks($arabicAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::ARBC->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($arabicAvg,0)) && ($subjectRemark->to_mark >= round($arabicAvg,0))){
            $arabicSubjectRemarks = $subjectRemark->remark;

            return $arabicSubjectRemarks;
        }
    }
}

function signLanguageSubjectRemarks($signLanguageAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::SGNLANG->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($signLanguageAvg,0)) && ($subjectRemark->to_mark >= round($signLanguageAvg,0))){
            $signLanguageSubjectRemarks = $subjectRemark->remark;

            return $signLanguageSubjectRemarks;
        }
    }
}

function musicSubjectRemarks($musicAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::MSC->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($musicAvg,0)) && ($subjectRemark->to_mark >= round($musicAvg,0))){
            $musicSubjectRemarks = $subjectRemark->remark;

            return $musicSubjectRemarks;
        }
    }
}

function woodWorkSubjectRemarks($woodWorkAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::WDWK->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($woodWorkAvg,0)) && ($subjectRemark->to_mark >= round($woodWorkAvg,0))){
            $woodWorkSubjectRemarks = $subjectRemark->remark;

            return $woodWorkSubjectRemarks;
        }
    }
}

function metalWorkSubjectRemarks($metalWorkAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::MTWK->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($metalWorkAvg,0)) && ($subjectRemark->to_mark >= round($metalWorkAvg,0))){
            $metalWorkSubjectRemarks = $subjectRemark->remark;

            return $metalWorkSubjectRemarks;
        }
    }
}

function buildingAndConstructionSubjectRemarks($buildingConstructionAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::BUILDCON->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($buildingConstructionAvg,0)) && ($subjectRemark->to_mark >= round($buildingConstructionAvg,0))){
            $buildingAndConstructionSubjectRemarks = $subjectRemark->remark;

            return $buildingAndConstructionSubjectRemarks;
        }
    }
}

function powerAndMechanicsSubjectRemarks($powerMechanicsAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::PWRMC->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($powerMechanicsAvg,0)) && ($subjectRemark->to_mark >= round($powerMechanicsAvg,0))){
            $powerAndMechanicsSubjectRemarks = $subjectRemark->remark;

            return $powerAndMechanicsSubjectRemarks;
        }
    }
}

function electricitySubjectRemarks($electricityAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::ELEC->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($electricityAvg,0)) && ($subjectRemark->to_mark >= round($electricityAvg,0))){
            $electricitySubjectRemarks = $subjectRemark->remark;

            return $electricitySubjectRemarks;
        }
    }
}

function aviationAndTechnologySubjectRemarks($aviationTechnologyAvg,$yearId,$termId,$streamId)
{
    $subjectRemarks = subjectRemarks($yearId,$termId,$streamId);
    foreach($subjectRemarks as $subjectRemark){
        if(($subjectRemark->subject->name === SubjectsEnum::AVTEC->value) && ($subjectRemark->year_id === $yearId) && ($subjectRemark->term_id === $termId) && ($subjectRemark->stream_id === $streamId) && ($subjectRemark->from_mark <= round($aviationTechnologyAvg,0)) && ($subjectRemark->to_mark >= round($aviationTechnologyAvg,0))){
            $aviationAndTechnologySubjectRemarks = $subjectRemark->remark;

            return $aviationAndTechnologySubjectRemarks;
        }
    }
}



//Stream Facilitators (Teachers assigned to every subject in a stream)
function streamMathematicsTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::MATHS->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamMathematicsTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamMathematicsTeacher;
            }
        }
    }
}

function streamEnglishTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::ENG->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamEnglishTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamEnglishTeacher;
            }
        }
    }
}

function streamKiswahiliTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::KISW->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamKiswahiliTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamKiswahiliTeacher;
            }
        }
    }
}

function streamChemistryTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::CHEM->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamChemistryTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamChemistryTeacher;
            }
        }
    }
}

function streamBiologyTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::BIO->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamBiologyTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamBiologyTeacher;
            }
        }
    }
}

function streamPhysicsTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::PHY->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamPhysicsTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamPhysicsTeacher;
            }
        }
    }
}

function streamCRETeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::CRE->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamCRETeacher = $salutation." ".$firstName." ".$lastName;

                return $streamCRETeacher;
            }
        }
    }
}

function streamIslamTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::ISLM->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamIslamTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamIslamTeacher;
            }
        }
    }
}

function streamHistoryAndGovernmentTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::HISTANDGOV->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamHistoryTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamHistoryTeacher;
            }
        }
    }
}

function streamGeographyTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::GEOG->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamGeographyTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamGeographyTeacher;
            }
        }
    }
}

function streamHomeScienceTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::HOMESC->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamHomeScienceTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamHomeScienceTeacher;
            }
        }
    }
}

function streamArtAndDesignTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::ARTDSGN->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamArtAndDesignTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamArtAndDesignTeacher;
            }
        }
    }
}

function streamAgricultureTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::AGRIC->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamAgricultureTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamAgricultureTeacher;
            }
        }
    }
}

function streamBusinessStudiesTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::BUZSTRDS->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamBusinessStudiesTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamBusinessStudiesTeacher;
            }
        }
    }
}

function streamComputerStudiesTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::COMPSTRDS->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamComputerStudiesTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamComputerStudiesTeacher;
            }
        }
    }
}

function streamDrawingAndDesignTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::DRWNDGN->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamDrawingAndDesignTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamDrawingAndDesignTeacher;
            }
        }
    }
}

function streamFrenchTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::FRNCH->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamFrenchTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamFrenchTeacher;
            }
        }
    }
}

function streamGermanTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::GRMN->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamGermanTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamGermanTeacher;
            }
        }
    }
}

function streamArabicTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::ARBC->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamArabicTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamArabicTeacher;
            }
        }
    }
}

function streamSignLanguageTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::SGNLANG->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamSignLanguageTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamSignLanguageTeacher;
            }
        }
    }
}

function streamMusicTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::MSC->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamMusicTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamMusicTeacher;
            }
        }
    }
}

function streamWoodWorkTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::WDWK->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamWoodWorkTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamWoodWorkTeacher;
            }
        }
    }
}

function streamMetalWorkTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::MTWK->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamMetalWorkTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamMetalWorkTeacher;
            }
        }
    }
}

function streamBuildingConstructionTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::BUILDCON->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamBuildingConstructionTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamBuildingConstructionTeacher;
            }
        }
    }
}

function streamPowerMechanicsTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::PWRMC->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamPowerMechanicsTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamPowerMechanicsTeacher;
            }
        }
    }
}

function streamElectricityTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::ELEC->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamElectricityTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamElectricityTeacher;
            }
        }
    }
}

function streamAviationTechnologyTeacher($streamId)
{
    $streamSubjectTeachers = StreamSubject::eagerLoaded()->get();
    if($streamSubjectTeachers->isNotEmpty()){
        foreach($streamSubjectTeachers as $streamSubjectTeacher){
            if(($streamSubjectTeacher->subject->name === SubjectsEnum::AVTEC->value) && ($streamSubjectTeacher->stream_id === $streamId)){
                $salutation = $streamSubjectTeacher->teacher->user->salutation;
                $firstName = $streamSubjectTeacher->teacher->user->first_name;
                $lastName = $streamSubjectTeacher->teacher->user->last_name;
                $streamAviationTechnologyTeacher = $salutation." ".$firstName." ".$lastName;

                return $streamAviationTechnologyTeacher;
            }
        }
    }
}


