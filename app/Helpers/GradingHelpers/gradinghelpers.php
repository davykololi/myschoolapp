<?php

use App\Models\Mark;
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Models\ReportRemark;
use App\Enums\SubjectsEnum;

function mark($yearId,$termId,$streamId,$name)
{
    $mark = Mark::when($yearId,function($query,$yearId){
        return $query->where('year_id',$yearId);
    })->when($termId,function($query,$termId){
        return $query->where('term_id',$termId);
    })->when($streamId,function($query,$streamId){
        return $query->where('stream_id',$streamId);
    })->when($name,function($query,$name){
        return $query->where('name','like',"%$name%");
    })->firstOrFail();

    return $mark;
}

function examMark($yearId,$termId,$streamId,$examId,$name)
{
    $examMark = Mark::when($yearId,function($query,$yearId){
        return $query->where('year_id',$yearId);
    })->when($termId,function($query,$termId){
        return $query->where('term_id',$termId);
    })->when($streamId,function($query,$streamId){
        return $query->where('stream_id',$streamId);
    })->when($examId,function($query,$examId){
        return $query->where('exam_id',$examId);
    })->when($name,function($query,$name){
        return $query->where('name','like',"%$name%");
    })->firstOrFail();

    return $examMark;
}

function examOneGrades($examOneMark)
{
    $examOneGrades = Grade::where(['exam_id'=>$examOneMark->exam->id,'term_id'=>$examOneMark->term->id,'year_id'=>$examOneMark->year->id])->with('class','exam','term','year','teacher','subject')->get();
        
    return $examOneGrades;
}

function examOneMathsGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::MATHS->value) && ($examOneGrade->from_mark <= $examOneMark->mathematics) && ($examOneGrade->to_mark >= $examOneMark->mathematics) && ($examOneMark->name === $markName)){
            $examOneMathsGrade = $examOneGrade->grade;
            return $examOneMathsGrade;
        }
    }
}

function examOneEnglishGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::ENG->value) && ($examOneGrade->from_mark <= $examOneMark->english) && ($examOneGrade->to_mark >= $examOneMark->english) && ($examOneMark->name === $markName)){
            $examOneEnglishGrade = $examOneGrade->grade;
            return $examOneEnglishGrade;
        }
    }  
}

function examOneKiswahiliGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::KISW->value) && ($examOneGrade->from_mark <= $examOneMark->kiswahili) && ($examOneGrade->to_mark >= $examOneMark->kiswahili) && ($examOneMark->name === $markName)){
            $examOneKiswahiliGrade = $examOneGrade->grade;
            return $examOneKiswahiliGrade;
        }
    }  
}

function examOneChemistryGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::CHEM->value) && ($examOneGrade->from_mark <= $examOneMark->chemistry) && ($examOneGrade->to_mark >= $examOneMark->chemistry) && ($examOneMark->name === $markName)){
            $examOneChemistryGrade = $examOneGrade->grade;
            return $examOneChemistryGrade;
        }
    }  
}

function examOneBiologyGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::BIO->value) && ($examOneGrade->from_mark <= $examOneMark->biology) && ($examOneGrade->to_mark >= $examOneMark->biology) && ($examOneMark->name === $markName)){
            $examOneBiologyGrade = $examOneGrade->grade;
            return $examOneBiologyGrade;
        }
    }  
}

function examOnePhysicsGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::PHY->value) && ($examOneGrade->from_mark <= $examOneMark->physics) && ($examOneGrade->to_mark >= $examOneMark->physics) && ($examOneMark->name === $markName)){
            $examOnePhysicsGrade = $examOneGrade->grade;
            return $examOnePhysicsGrade;
        }
    }  
}

function examOneCREGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::CRE->value) && ($examOneGrade->from_mark <= $examOneMark->cre) && ($examOneGrade->to_mark >= $examOneMark->cre) && ($examOneMark->name === $markName)){
            $examOneCREGrade = $examOneGrade->grade;
            return $examOneCREGrade;
        }
    }  
}

function examOneIslamGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::ISLM->value) && ($examOneGrade->from_mark <= $examOneMark->islam) && ($examOneGrade->to_mark >= $examOneMark->islam) && ($examOneMark->name === $markName)){
            $examOneIslamGrade = $examOneGrade->grade;
            return $examOneIslamGrade;
        }
    }  
}

function examOneHistoryAndGovernmentGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::HISTANDGOV->value) && ($examOneGrade->from_mark <= $examOneMark->history_and_government) && ($examOneGrade->to_mark >= $examOneMark->history_and_government) && ($examOneMark->name === $markName)){
            $examOneHistoryGrade = $examOneGrade->grade;
            return $examOneHistoryGrade;
        }
    }  
}

function examOneGeographyGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::GEOG->value) && ($examOneGrade->from_mark <= $examOneMark->geography) && ($examOneGrade->to_mark >= $examOneMark->geography) && ($examOneMark->name === $markName)){
            $examOneGeogGrade = $examOneGrade->grade;
            return $examOneGeogGrade;
        }
    }  
}

function examOneHomeScienceGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::HOMESC->value) && ($examOneGrade->from_mark <= $examOneMark->home_science) && ($examOneGrade->to_mark >= $examOneMark->home_science) && ($examOneMark->name === $markName)){
            $examOneHomeScienceGrade = $examOneGrade->grade;
            return $examOneHomeScienceGrade;
        }
    }  
}

function examOneArtAndDesignGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::ARTDSGN->value) && ($examOneGrade->from_mark <= $examOneMark->art_and_design) && ($examOneGrade->to_mark >= $examOneMark->art_and_design) && ($examOneMark->name === $markName)){
            $examOneArtAndDesignGrade = $examOneGrade->grade;
            return $examOneArtAndDesignGrade;
        }
    }  
}

function examOneAgricultureGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::AGRIC->value) && ($examOneGrade->from_mark <= $examOneMark->agriculture) && ($examOneGrade->to_mark >= $examOneMark->agriculture) && ($examOneMark->name === $markName)){
            $examOneAgricultureGrade = $examOneGrade->grade;
            return $examOneAgricultureGrade;
        }
    }  
}

function examOneBusinessStudiesGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::BUZSTRDS->value) && ($examOneGrade->from_mark <= $examOneMark->business_studies) && ($examOneGrade->to_mark >= $examOneMark->business_studies) && ($examOneMark->name === $markName)){
            $examOneBusinessStudiesGrade = $examOneGrade->grade;
            return $examOneBusinessStudiesGrade;
        }
    }  
}

function examOneComputerStudiesGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::COMPSTRDS->value) && ($examOneGrade->from_mark <= $examOneMark->computer_studies) && ($examOneGrade->to_mark >= $examOneMark->computer_studies) && ($examOneMark->name === $markName)){
            $examOneComputerStudiesGrade = $examOneGrade->grade;
            return $examOneComputerStudiesGrade;
        }
    }  
}

function examOneDrawingAndDesignGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::DRWNDGN->value) && ($examOneGrade->from_mark <= $examOneMark->drawing_and_design) && ($examOneGrade->to_mark >= $examOneMark->drawing_and_design) && ($examOneMark->name === $markName)){
            $examOneDrawingAndDesignGrade = $examOneGrade->grade;
            return $examOneDrawingAndDesignGrade;
        }
    }  
}

function examOneFrenchGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::FRNCH->value) && ($examOneGrade->from_mark <= $examOneMark->french) && ($examOneGrade->to_mark >= $examOneMark->french) && ($examOneMark->name === $markName)){
            $examOneFrenchGrade = $examOneGrade->grade;
            return $examOneFrenchGrade;
        }
    }  
}

function examOneGermanGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::GRMN->value) && ($examOneGrade->from_mark <= $examOneMark->german) && ($examOneGrade->to_mark >= $examOneMark->german) && ($examOneMark->name === $markName)){
            $examOneGermanGrade = $examOneGrade->grade;
            return $examOneGermanGrade;
        }
    }  
}

function examOneArabicGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::ARBC->value) && ($examOneGrade->from_mark <= $examOneMark->arabic) && ($examOneGrade->to_mark >= $examOneMark->arabic) && ($examOneMark->name === $markName)){
            $examOneArabicGrade = $examOneGrade->grade;
            return $examOneArabicGrade;
        }
    }  
}

function examOneSignLanguageGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::SGNLANG->value) && ($examOneGrade->from_mark <= $examOneMark->sign_language) && ($examOneGrade->to_mark >= $examOneMark->sign_language) && ($examOneMark->name === $markName)){
            $examOneSignLanguageGrade = $examOneGrade->grade;
            return $examOneSignLanguageGrade;
        }
    }  
}

function examOneMusicGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::MSC->value) && ($examOneGrade->from_mark <= $examOneMark->music) && ($examOneGrade->to_mark >= $examOneMark->music) && ($examOneMark->name === $markName)){
            $examOneMusicGrade = $examOneGrade->grade;
            return $examOneMusicGrade;
        }
    }  
}

function examOneWoodWorkGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::WDWK->value) && ($examOneGrade->from_mark <= $examOneMark->wood_work) && ($examOneGrade->to_mark >= $examOneMark->wood_work) && ($examOneMark->name === $markName)){
            $examOneWoodWorkGrade = $examOneGrade->grade;
            return $examOneWoodWorkGrade;
        }
    }  
}

function examOneMetalWorkGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::MTWK->value) && ($examOneGrade->from_mark <= $examOneMark->metal_work) && ($examOneGrade->to_mark >= $examOneMark->metal_work) && ($examOneMark->name === $markName)){
            $examOneMetalWorkGrade = $examOneGrade->grade;
            return $examOneMetalWorkGrade;
        }
    }  
}

function examOneBuildingConstructionGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::BUILDCON->value) && ($examOneGrade->from_mark <= $examOneMark->building_construction) && ($examOneGrade->to_mark >= $examOneMark->building_construction) && ($examOneMark->name === $markName)){
            $examOneBuildingConstructionGrade = $examOneGrade->grade;
            return $examOneBuildingConstructionGrade;
        }
    }  
}

function examOnePowerMechanicsGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::PWRMC->value) && ($examOneGrade->from_mark <= $examOneMark->power_mechanics) && ($examOneGrade->to_mark >= $examOneMark->power_mechanics) && ($examOneMark->name === $markName)){
            $examOnePowerMechanicsGrade = $examOneGrade->grade;
            return $examOnePowerMechanicsGrade;
        }
    }  
}

function examOneElectricityGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::ELEC->value) && ($examOneGrade->from_mark <= $examOneMark->electricity) && ($examOneGrade->to_mark >= $examOneMark->electricity) && ($examOneMark->name === $markName)){
            $examOneElectricityGrade = $examOneGrade->grade;
            return $examOneElectricityGrade;
        }
    }  
}

function examOneAviationTechnologyGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::AVTEC->value) && ($examOneGrade->from_mark <= $examOneMark->aviation_technology) && ($examOneGrade->to_mark >= $examOneMark->aviation_technology) && ($examOneMark->name === $markName)){
            $examOneAviationTechnologyGrade = $examOneGrade->grade;
            return $examOneAviationTechnologyGrade;
        }
    }  
}
//End of Exam One Mark Grading

// Start of Exam Two Mark Grading
function examTwoGrades($examTwoMark)
{
    $examTwoGrades = Grade::where(['exam_id'=>$examTwoMark->exam->id,'term_id'=>$examTwoMark->term->id,'year_id'=>$examTwoMark->year->id])->with('class','exam','term','year','teacher','subject')->get();
        
    return $examTwoGrades;
}

function examTwoMathsGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::MATHS->value) && ($examTwoGrade->from_mark <= $examTwoMark->mathematics) && ($examTwoGrade->to_mark >= $examTwoMark->mathematics) && ($examTwoMark->name === $markName)){
            $examTwoMathsGrade = $examTwoGrade->grade;
            return $examTwoMathsGrade;
        }
    }
}

function examTwoEnglishGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::ENG->value) && ($examTwoGrade->from_mark <= $examTwoMark->english) && ($examTwoGrade->to_mark >= $examTwoMark->english) && ($examTwoMark->name === $markName)){
            $examTwoEnglishGrade = $examTwoGrade->grade;
            return $examTwoEnglishGrade;
        }
    }
}

function examTwoKiswahiliGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::KISW->value) && ($examTwoGrade->from_mark <= $examTwoMark->kiswahili) && ($examTwoGrade->to_mark >= $examTwoMark->kiswahili) && ($examTwoMark->name === $markName)){
            $examTwoKiswahiliGrade = $examTwoGrade->grade;
            return $examTwoKiswahiliGrade;
        }
    }
}

function examTwoChemistryGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::CHEM->value) && ($examTwoGrade->from_mark <= $examTwoMark->chemistry) && ($examTwoGrade->to_mark >= $examTwoMark->chemistry) && ($examTwoMark->name === $markName)){
            $examTwoChemistryGrade = $examTwoGrade->grade;
            return $examTwoChemistryGrade;
        }
    }
}

function examTwoBiologyGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::BIO->value) && ($examTwoGrade->from_mark <= $examTwoMark->biology) && ($examTwoGrade->to_mark >= $examTwoMark->biology) && ($examTwoMark->name === $markName)){
            $examTwoBiologyGrade = $examTwoGrade->grade;
            return $examTwoBiologyGrade;
        }
    }
}

function examTwoPhysicsGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::PHY->value) && ($examTwoGrade->from_mark <= $examTwoMark->physics) && ($examTwoGrade->to_mark >= $examTwoMark->physics) && ($examTwoMark->name === $markName)){
            $examTwoPhysicsGrade = $examTwoGrade->grade;
            return $examTwoPhysicsGrade;
        }
    }
}

function examTwoCREGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::CRE->value) && ($examTwoGrade->from_mark <= $examTwoMark->cre) && ($examTwoGrade->to_mark >= $examTwoMark->cre) && ($examTwoMark->name === $markName)){
            $examTwoCREGrade = $examTwoGrade->grade;
            return $examTwoCREGrade;
        }
    }
}

function examTwoIslamGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::ISLM->value) && ($examTwoGrade->from_mark <= $examTwoMark->islam) && ($examTwoGrade->to_mark >= $examTwoMark->islam) && ($examTwoMark->name === $markName)){
            $examTwoIslamGrade = $examTwoGrade->grade;
            return $examTwoIslamGrade;
        }
    }
}

function examTwoHistoryAndGovernmentGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::HISTANDGOV->value) && ($examTwoGrade->from_mark <= $examTwoMark->history_and_government) && ($examTwoGrade->to_mark >= $examTwoMark->history_and_government) && ($examTwoMark->name === $markName)){
            $examTwoHistoryGrade = $examTwoGrade->grade;
            return $examTwoHistoryGrade;
        }
    }
}

function examTwoGeographyGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::GEOG->value) && ($examTwoGrade->from_mark <= $examTwoMark->geography) && ($examTwoGrade->to_mark >= $examTwoMark->geography) && ($examTwoMark->name === $markName)){
            $examTwoGeogGrade = $examTwoGrade->grade;
            return $examTwoGeogGrade;
        }
    }
}

function examTwoHomeSciencegGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::HOMESC->value) && ($examTwoGrade->from_mark <= $examTwoMark->home_science) && ($examTwoGrade->to_mark >= $examTwoMark->home_science) && ($examTwoMark->name === $markName)){
            $examTwoHomeSciencegGrade = $examTwoGrade->grade;
            return $examTwoHomeSciencegGrade;
        }
    }
}

function examTwoArtAndDesignGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::ARTDSGN->value) && ($examTwoGrade->from_mark <= $examTwoMark->art_and_design) && ($examTwoGrade->to_mark >= $examTwoMark->art_and_design) && ($examTwoMark->name === $markName)){
            $examTwoArtAndDesignGrade = $examTwoGrade->grade;
            return $examTwoArtAndDesignGrade;
        }
    }
}

function examTwoAgricultureGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::AGRIC->value) && ($examTwoGrade->from_mark <= $examTwoMark->agriculture) && ($examTwoGrade->to_mark >= $examTwoMark->agriculture) && ($examTwoMark->name === $markName)){
            $examTwoAgricultureGrade = $examTwoGrade->grade;
            return $examTwoAgricultureGrade;
        }
    }
}

function examTwoBusinessStudiesGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::BUZSTRDS->value) && ($examTwoGrade->from_mark <= $examTwoMark->business_studies) && ($examTwoGrade->to_mark >= $examTwoMark->business_studies) && ($examTwoMark->name === $markName)){
            $examTwoBusinessStudiesGrade = $examTwoGrade->grade;
            return $examTwoBusinessStudiesGrade;
        }
    }
}

function examTwoComputerStudiesGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::COMPSTRDS->value) && ($examTwoGrade->from_mark <= $examTwoMark->computer_studies) && ($examTwoGrade->to_mark >= $examTwoMark->computer_studies) && ($examTwoMark->name === $markName)){
            $examTwoComputerStudiesGrade = $examTwoGrade->grade;
            return $examTwoComputerStudiesGrade;
        }
    }
}

function examTwoDrawingAndDesignGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::DRWNDGN->value) && ($examTwoGrade->from_mark <= $examTwoMark->drawing_and_design) && ($examTwoGrade->to_mark >= $examTwoMark->drawing_and_design) && ($examTwoMark->name === $markName)){
            $examTwoDrawingAndDesignGrade = $examTwoGrade->grade;
            return $examTwoDrawingAndDesignGrade;
        }
    }
}

function examTwoFrenchGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::FRNCH->value) && ($examTwoGrade->from_mark <= $examTwoMark->french) && ($examTwoGrade->to_mark >= $examTwoMark->french) && ($examTwoMark->name === $markName)){
            $examTwoFrenchGrade = $examTwoGrade->grade;
            return $examTwoFrenchGrade;
        }
    }
}

function examTwoGermanGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::GRMN->value) && ($examTwoGrade->from_mark <= $examTwoMark->german) && ($examTwoGrade->to_mark >= $examTwoMark->german) && ($examTwoMark->name === $markName)){
            $examTwoGermanGrade = $examTwoGrade->grade;
            return $examTwoGermanGrade;
        }
    }
}

function examTwoArabicGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::ARBC->value) && ($examTwoGrade->from_mark <= $examTwoMark->arabic) && ($examTwoGrade->to_mark >= $examTwoMark->arabic) && ($examTwoMark->name === $markName)){
            $examTwoArabicGrade = $examTwoGrade->grade;
            return $examTwoArabicGrade;
        }
    }
}

function examTwoSignLanguageGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::SGNLANG->value) && ($examTwoGrade->from_mark <= $examTwoMark->sign_language) && ($examTwoGrade->to_mark >= $examTwoMark->sign_language) && ($examTwoMark->name === $markName)){
            $examTwoSignLanguageGrade = $examTwoGrade->grade;
            return $examTwoSignLanguageGrade;
        }
    }
}

function examTwoMusicGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::MSC->value) && ($examTwoGrade->from_mark <= $examTwoMark->music) && ($examTwoGrade->to_mark >= $examTwoMark->music) && ($examTwoMark->name === $markName)){
            $examTwoMusicGrade = $examTwoGrade->grade;
            return $examTwoMusicGrade;
        }
    }
}

function examTwoWoodWorkGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::WDWK->value) && ($examTwoGrade->from_mark <= $examTwoMark->wood_work) && ($examTwoGrade->to_mark >= $examTwoMark->wood_work) && ($examTwoMark->name === $markName)){
            $examTwoWoodWorkGrade = $examTwoGrade->grade;
            return $examTwoWoodWorkGrade;
        }
    }
}

function examTwoMetalWorkGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::MTWK->value) && ($examTwoGrade->from_mark <= $examTwoMark->metal_work) && ($examTwoGrade->to_mark >= $examTwoMark->metal_work) && ($examTwoMark->name === $markName)){
            $examTwoMetalWorkGrade = $examTwoGrade->grade;
            return $examTwoMetalWorkGrade;
        }
    }
}

function examTwoBuildingConstructionGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::BUILDCON->value) && ($examTwoGrade->from_mark <= $examTwoMark->building_construction) && ($examTwoGrade->to_mark >= $examTwoMark->building_construction) && ($examTwoMark->name === $markName)){
            $examTwoBuildingConstructionGrade = $examTwoGrade->grade;
            return $examTwoBuildingConstructionGrade;
        }
    }
}

function examTwoPowerMechanicsGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::PWRMC->value) && ($examTwoGrade->from_mark <= $examTwoMark->power_mechanics) && ($examTwoGrade->to_mark >= $examTwoMark->power_mechanics) && ($examTwoMark->name === $markName)){
            $examTwoPowerMechanicsGrade = $examTwoGrade->grade;
            return $examTwoPowerMechanicsGrade;
        }
    }
}

function examTwoElectricityGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::ELEC->value) && ($examTwoGrade->from_mark <= $examTwoMark->electricity) && ($examTwoGrade->to_mark >= $examTwoMark->electricity) && ($examTwoMark->name === $markName)){
            $examTwoElectricityGrade = $examTwoGrade->grade;
            return $examTwoElectricityGrade;
        }
    }
}

function examTwoAviationTechnologyGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::AVTEC->value) && ($examTwoGrade->from_mark <= $examTwoMark->aviation_technology) && ($examTwoGrade->to_mark >= $examTwoMark->aviation_technology) && ($examTwoMark->name === $markName)){
            $examTwoAviationTechnologyGrade = $examTwoGrade->grade;
            return $examTwoAviationTechnologyGrade;
        }
    }
}
//End of Exam Two Mark Grading

//Start of Exam Three Mark Grading
function examThreeGrades($examThreeMark)
{
    $examThreeGrades = Grade::where(['exam_id'=>$examThreeMark->exam->id,'term_id'=>$examThreeMark->term->id,'year_id'=>$examThreeMark->year->id])->with('class','exam','term','year','teacher','subject')->get();
        
    return $examThreeGrades;
}

function examThreeMathsGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::MATHS->value) && ($examThreeGrade->from_mark <= $examThreeMark->mathematics) && ($examThreeGrade->to_mark >= $examThreeMark->mathematics) && ($examThreeMark->name === $markName)){
            $examThreeMathsGrade = $examThreeGrade->grade;
            return $examThreeMathsGrade;
        }
    }
}

function examThreeEnglishGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::ENG->value) && ($examThreeGrade->from_mark <= $examThreeMark->english) && ($examThreeGrade->to_mark >= $examThreeMark->english) && ($examThreeMark->name === $markName)){
            $examThreeEnglishGrade = $examThreeGrade->grade;
            return $examThreeEnglishGrade;
        }
    }
}

function examThreeKiswahiliGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::KISW->value) && ($examThreeGrade->from_mark <= $examThreeMark->kiswahili) && ($examThreeGrade->to_mark >= $examThreeMark->kiswahili) && ($examThreeMark->name === $markName)){
            $examThreeKiswahiliGrade = $examThreeGrade->grade;
            return $examThreeKiswahiliGrade;
        }
    }
}

function examThreeChemistryGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::CHEM->value) && ($examThreeGrade->from_mark <= $examThreeMark->chemistry) && ($examThreeGrade->to_mark >= $examThreeMark->chemistry) && ($examThreeMark->name === $markName)){
            $examThreeChemistryGrade = $examThreeGrade->grade;
            return $examThreeChemistryGrade;
        }
    }
}

function examThreeBiologyGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::BIO->value) && ($examThreeGrade->from_mark <= $examThreeMark->biology) && ($examThreeGrade->to_mark >= $examThreeMark->biology) && ($examThreeMark->name === $markName)){
            $examThreeBiologyGrade = $examThreeGrade->grade;
            return $examThreeBiologyGrade;
        }
    }
}

function examThreePhysicsGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::PHY->value) && ($examThreeGrade->from_mark <= $examThreeMark->physics) && ($examThreeGrade->to_mark >= $examThreeMark->physics) && ($examThreeMark->name === $markName)){
            $examThreePhysicsGrade = $examThreeGrade->grade;
            return $examThreePhysicsGrade;
        }
    }
}

function examThreeCREGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::CRE->value) && ($examThreeGrade->from_mark <= $examThreeMark->cre) && ($examThreeGrade->to_mark >= $examThreeMark->cre) && ($examThreeMark->name === $markName)){
            $examThreeCREGrade = $examThreeGrade->grade;
            return $examThreeCREGrade;
        }
    }
}

function examThreeIslamGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::ISLM->value) && ($examThreeGrade->from_mark <= $examThreeMark->islam) && ($examThreeGrade->to_mark >= $examThreeMark->islam) && ($examThreeMark->name === $markName)){
            $examThreeIslamGrade = $examThreeGrade->grade;
            return $examThreeIslamGrade;
        }
    }
}

function examThreeHistoryAndGovernmentGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::HISTANDGOV->value) && ($examThreeGrade->from_mark <= $examThreeMark->history_and_government) && ($examThreeGrade->to_mark >= $examThreeMark->history_and_government) && ($examThreeMark->name === $markName)){
            $examThreeHistoryGrade = $examThreeGrade->grade;
            return $examThreeHistoryGrade;
        }
    }
}

function examThreeGeogGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::GEOG->value) && ($examThreeGrade->from_mark <= $examThreeMark->geography) && ($examThreeGrade->to_mark >= $examThreeMark->geography) && ($examThreeMark->name === $markName)){
            $examThreeGeogGrade = $examThreeGrade->grade;
            return $examThreeGeogGrade;
        }
    }
}

function examThreeHomeScienceGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::HOMESC->value) && ($examThreeGrade->from_mark <= $examThreeMark->home_science) && ($examThreeGrade->to_mark >= $examThreeMark->home_science) && ($examThreeMark->name === $markName)){
            $examThreeHomeScienceGrade = $examThreeGrade->grade;
            return $examThreeHomeScienceGrade;
        }
    }
}

function examThreeArtAndDesignGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::ARTDSGN->value) && ($examThreeGrade->from_mark <= $examThreeMark->art_and_design) && ($examThreeGrade->to_mark >= $examThreeMark->art_and_design) && ($examThreeMark->name === $markName)){
            $examThreeArtAndDesignGrade = $examThreeGrade->grade;
            return $examThreeArtAndDesignGrade;
        }
    }
}

function examThreeAgricultureGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::AGRIC->value) && ($examThreeGrade->from_mark <= $examThreeMark->agriculture) && ($examThreeGrade->to_mark >= $examThreeMark->agriculture) && ($examThreeMark->name === $markName)){
            $examThreeAgricultureGrade = $examThreeGrade->grade;
            return $examThreeAgricultureGrade;
        }
    }
}

function examThreeBusinessStudiesGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::BUZSTRDS->value) && ($examThreeGrade->from_mark <= $examThreeMark->business_studies) && ($examThreeGrade->to_mark >= $examThreeMark->business_studies) && ($examThreeMark->name === $markName)){
            $examThreeBusinessStudiesGrade = $examThreeGrade->grade;
            return $examThreeBusinessStudiesGrade;
        }
    }
}

function examThreeComputerStudiesGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::COMPSTRDS->value) && ($examThreeGrade->from_mark <= $examThreeMark->computer_studies) && ($examThreeGrade->to_mark >= $examThreeMark->computer_studies) && ($examThreeMark->name === $markName)){
            $examThreeComputerStudiesGrade = $examThreeGrade->grade;
            return $examThreeComputerStudiesGrade;
        }
    }
}

function examThreeDrawingAndDesignGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::DRWNDGN->value) && ($examThreeGrade->from_mark <= $examThreeMark->drawing_and_design) && ($examThreeGrade->to_mark >= $examThreeMark->drawing_and_design) && ($examThreeMark->name === $markName)){
            $examThreeDrawingAndDesignGrade = $examThreeGrade->grade;
            return $examThreeDrawingAndDesignGrade;
        }
    }
}

function examThreeFrenchGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::FRNCH->value) && ($examThreeGrade->from_mark <= $examThreeMark->french) && ($examThreeGrade->to_mark >= $examThreeMark->french) && ($examThreeMark->name === $markName)){
            $examThreeFrenchGrade = $examThreeGrade->grade;
            return $examThreeFrenchGrade;
        }
    }
}

function examThreeGermanGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::GRMN->value) && ($examThreeGrade->from_mark <= $examThreeMark->german) && ($examThreeGrade->to_mark >= $examThreeMark->german) && ($examThreeMark->name === $markName)){
            $examThreeGermanGrade = $examThreeGrade->grade;
            return $examThreeGermanGrade;
        }
    }
}

function examThreeArabicGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::ARBC->value) && ($examThreeGrade->from_mark <= $examThreeMark->arabic) && ($examThreeGrade->to_mark >= $examThreeMark->arabic) && ($examThreeMark->name === $markName)){
            $examThreeArabicGrade = $examThreeGrade->grade;
            return $examThreeArabicGrade;
        }
    }
}

function examThreeSignLanguageGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::SGNLANG->value) && ($examThreeGrade->from_mark <= $examThreeMark->sign_language) && ($examThreeGrade->to_mark >= $examThreeMark->sign_language) && ($examThreeMark->name === $markName)){
            $examThreeSignLanguageGrade = $examThreeGrade->grade;
            return $examThreeSignLanguageGrade;
        }
    }
}

function examThreeMusicGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::MSC->value) && ($examThreeGrade->from_mark <= $examThreeMark->music) && ($examThreeGrade->to_mark >= $examThreeMark->music) && ($examThreeMark->name === $markName)){
            $examThreeMusicGrade = $examThreeGrade->grade;
            return $examThreeMusicGrade;
        }
    }
}

function examThreeWoodWorkGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::WDWK->value) && ($examThreeGrade->from_mark <= $examThreeMark->wood_work) && ($examThreeGrade->to_mark >= $examThreeMark->wood_work) && ($examThreeMark->name === $markName)){
            $examThreeWoodWorkGrade = $examThreeGrade->grade;
            return $examThreeWoodWorkGrade;
        }
    }
}

function examThreeMetalWorkGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::MTWK->value) && ($examThreeGrade->from_mark <= $examThreeMark->metal_work) && ($examThreeGrade->to_mark >= $examThreeMark->metal_work) && ($examThreeMark->name === $markName)){
            $examThreeMetalWorkGrade = $examThreeGrade->grade;
            return $examThreeMetalWorkGrade;
        }
    }
}

function examThreeBuildingConstructionGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::BUILDCON->value) && ($examThreeGrade->from_mark <= $examThreeMark->building_construction) && ($examThreeGrade->to_mark >= $examThreeMark->building_construction) && ($examThreeMark->name === $markName)){
            $examThreeBuildingConstructionGrade = $examThreeGrade->grade;
            return $examThreeBuildingConstructionGrade;
        }
    }
}

function examThreePowerMechanicsGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::PWRMC->value) && ($examThreeGrade->from_mark <= $examThreeMark->power_mechanics) && ($examThreeGrade->to_mark >= $examThreeMark->power_mechanics) && ($examThreeMark->name === $markName)){
            $examThreePowerMechanicsGrade = $examThreeGrade->grade;
            return $examThreePowerMechanicsGrade;
        }
    }
}

function examThreeElectricityGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::ELEC->value) && ($examThreeGrade->from_mark <= $examThreeMark->electricity) && ($examThreeGrade->to_mark >= $examThreeMark->electricity) && ($examThreeMark->name === $markName)){
            $examThreeElectricityGrade = $examThreeGrade->grade;
            return $examThreeElectricityGrade;
        }
    }
}

function examThreeAviationTechnologyGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::AVTEC->value) && ($examThreeGrade->from_mark <= $examThreeMark->aviation_technology) && ($examThreeGrade->to_mark >= $examThreeMark->aviation_technology) && ($examThreeMark->name === $markName)){
            $examThreeAviationTechnologyGrade = $examThreeGrade->grade;
            return $examThreeAviationTechnologyGrade;
        }
    }
}
//End of Exam Three Mark Grading



//Start of Exam One Mark Grade Points
/**
 * Exam Grade Points
 * @param App\Models\Year $yearId
 * @param App\Models\Term $termId
 * @param App\Models\Exam $examOneMark
 * @param $markName
 * 
 * */
function examOneMathsGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::MATHS->value) && ($examOneGrade->from_mark <= $examOneMark->mathematics) && ($examOneGrade->to_mark >= $examOneMark->mathematics) && ($examOneMark->name === $markName)){
            $examOneMathsGradePoints = $examOneGrade->points;
            return $examOneMathsGradePoints;
        }
    }
}

function examOneEnglishGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::ENG->value) && ($examOneGrade->from_mark <= $examOneMark->english) && ($examOneGrade->to_mark >= $examOneMark->english) && ($examOneMark->name === $markName)){
            $examOneEnglishGradePoints = $examOneGrade->points;
            return $examOneEnglishGradePoints;
        }
    }  
}

function examOneKiswahiliGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::KISW->value) && ($examOneGrade->from_mark <= $examOneMark->kiswahili) && ($examOneGrade->to_mark >= $examOneMark->kiswahili) && ($examOneMark->name === $markName)){
            $examOneKiswahiliGradePoints = $examOneGrade->points;
            return $examOneKiswahiliGradePoints;
        }
    }  
}

function examOneChemistryGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::CHEM->value) && ($examOneGrade->from_mark <= $examOneMark->chemistry) && ($examOneGrade->to_mark >= $examOneMark->chemistry) && ($examOneMark->name === $markName)){
            $examOneChemistryGradePoints = $examOneGrade->points;
            return $examOneChemistryGradePoints;
        }
    }  
}

function examOneBiologyGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::BIO->value) && ($examOneGrade->from_mark <= $examOneMark->biology) && ($examOneGrade->to_mark >= $examOneMark->biology) && ($examOneMark->name === $markName)){
            $examOneBiologyGradePoints = $examOneGrade->points;
            return $examOneBiologyGradePoints;
        }
    }  
}

function examOnePhysicsGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::PHY->value) && ($examOneGrade->from_mark <= $examOneMark->physics) && ($examOneGrade->to_mark >= $examOneMark->physics) && ($examOneMark->name === $markName)){
            $examOnePhysicsGradePoints = $examOneGrade->points;
            return $examOnePhysicsGradePoints;
        }
    }  
}

function examOneCREGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::CRE->value) && ($examOneGrade->from_mark <= $examOneMark->cre) && ($examOneGrade->to_mark >= $examOneMark->cre) && ($examOneMark->name === $markName)){
            $examOneCREGradePoints = $examOneGrade->points;
            return $examOneCREGradePoints;
        }
    }  
}

function examOneIslamGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::ISLM->value) && ($examOneGrade->from_mark <= $examOneMark->islam) && ($examOneGrade->to_mark >= $examOneMark->islam) && ($examOneMark->name === $markName)){
            $examOneIslamGradePoints = $examOneGrade->points;
            return $examOneIslamGradePoints;
        }
    }  
}

function examOneHistoryAndGovernmentGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::HISTANDGOV->value) && ($examOneGrade->from_mark <= $examOneMark->history_and_government) && ($examOneGrade->to_mark >= $examOneMark->history_and_government) && ($examOneMark->name === $markName)){
            $examOneHistoryGradePoints = $examOneGrade->points;
            return $examOneHistoryGradePoints;
        }
    }  
}

function examOneGeographyGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::GEOG->value) && ($examOneGrade->from_mark <= $examOneMark->geography) && ($examOneGrade->to_mark >= $examOneMark->geography) && ($examOneMark->name === $markName)){
            $examOneGeogGradePoints = $examOneGrade->points;
            return $examOneGeogGradePoints;
        }
    }  
}

function examOneHomeScienceGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::HOMESC->value) && ($examOneGrade->from_mark <= $examOneMark->home_science) && ($examOneGrade->to_mark >= $examOneMark->home_science) && ($examOneMark->name === $markName)){
            $examOneHomeScienceGradePoints = $examOneGrade->points;
            return $examOneHomeScienceGradePoints;
        }
    }  
}

function examOneArtAndDesignGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::ARTDSGN->value) && ($examOneGrade->from_mark <= $examOneMark->art_and_design) && ($examOneGrade->to_mark >= $examOneMark->art_and_design) && ($examOneMark->name === $markName)){
            $examOneArtAndDesignGradePoints = $examOneGrade->points;
            return $examOneArtAndDesignGradePoints;
        }
    }  
}

function examOneAgricultureGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::AGRIC->value) && ($examOneGrade->from_mark <= $examOneMark->agriculture) && ($examOneGrade->to_mark >= $examOneMark->agriculture) && ($examOneMark->name === $markName)){
            $examOneAgricultureGradePoints = $examOneGrade->points;
            return $examOneAgricultureGradePoints;
        }
    }  
}

function examOneBusinessStudiesGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::BUZSTRDS->value) && ($examOneGrade->from_mark <= $examOneMark->business_studies) && ($examOneGrade->to_mark >= $examOneMark->business_studies) && ($examOneMark->name === $markName)){
            $examOneBusinessStudiesGradePoints = $examOneGrade->points;
            return $examOneBusinessStudiesGradePoints;
        }
    }  
}

function examOneComputerStudiesGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::COMPSTRDS->value) && ($examOneGrade->from_mark <= $examOneMark->computer_studies) && ($examOneGrade->to_mark >= $examOneMark->computer_studies) && ($examOneMark->name === $markName)){
            $examOneComputerStudiesGradePoints = $examOneGrade->points;
            return $examOneComputerStudiesGradePoints;
        }
    }  
}

function examOneDrawingAndDesignGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::DRWNDGN->value) && ($examOneGrade->from_mark <= $examOneMark->drawing_and_design) && ($examOneGrade->to_mark >= $examOneMark->drawing_and_design) && ($examOneMark->name === $markName)){
            $examOneDrawingAndDesignGradePoints = $examOneGrade->points;
            return $examOneDrawingAndDesignGradePoints;
        }
    }  
}

function examOneFrenchGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::FRNCH->value) && ($examOneGrade->from_mark <= $examOneMark->french) && ($examOneGrade->to_mark >= $examOneMark->french) && ($examOneMark->name === $markName)){
            $examOneFrenchGradePoints = $examOneGrade->points;
            return $examOneFrenchGradePoints;
        }
    }  
}

function examOneGermanGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::GRMN->value) && ($examOneGrade->from_mark <= $examOneMark->german) && ($examOneGrade->to_mark >= $examOneMark->german) && ($examOneMark->name === $markName)){
            $examOneGermanGradePoints = $examOneGrade->points;
            return $examOneGermanGradePoints;
        }
    }  
}

function examOneArabicGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::ARBC->value) && ($examOneGrade->from_mark <= $examOneMark->arabic) && ($examOneGrade->to_mark >= $examOneMark->arabic) && ($examOneMark->name === $markName)){
            $examOneArabicGradePoints = $examOneGrade->points;
            return $examOneArabicGradePoints;
        }
    }  
}

function examOneSignLanguageGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::SGNLANG->value) && ($examOneGrade->from_mark <= $examOneMark->sign_language) && ($examOneGrade->to_mark >= $examOneMark->sign_language) && ($examOneMark->name === $markName)){
            $examOneSignLanguageGradePoints = $examOneGrade->points;
            return $examOneSignLanguageGradePoints;
        }
    }  
}

function examOneMusicGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::MSC->value) && ($examOneGrade->from_mark <= $examOneMark->music) && ($examOneGrade->to_mark >= $examOneMark->music) && ($examOneMark->name === $markName)){
            $examOneMusicGradePoints = $examOneGrade->points;
            return $examOneMusicGradePoints;
        }
    }  
}

function examOneWoodWorkGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::WDWK->value) && ($examOneGrade->from_mark <= $examOneMark->wood_work) && ($examOneGrade->to_mark >= $examOneMark->wood_work) && ($examOneMark->name === $markName)){
            $examOneWoodWorkGradePoints = $examOneGrade->points;
            return $examOneWoodWorkGradePoints;
        }
    }  
}

function examOneMetalWorkgGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::MTWK->value) && ($examOneGrade->from_mark <= $examOneMark->metal_work) && ($examOneGrade->to_mark >= $examOneMark->metal_work) && ($examOneMark->name === $markName)){
            $examOneMetalWorkgGradePoints = $examOneGrade->points;
            return $examOneMetalWorkgGradePoints;
        }
    }  
}

function examOneBuildingConstructionGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::BUILDCON->value) && ($examOneGrade->from_mark <= $examOneMark->building_construction) && ($examOneGrade->to_mark >= $examOneMark->building_construction) && ($examOneMark->name === $markName)){
            $examOneBuildingConstructionGradePoints = $examOneGrade->points;
            return $examOneBuildingConstructionGradePoints;
        }
    }  
}

function examOnePowerMechanicsGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::PWRMC->value) && ($examOneGrade->from_mark <= $examOneMark->power_mechanics) && ($examOneGrade->to_mark >= $examOneMark->power_mechanics) && ($examOneMark->name === $markName)){
            $examOnePowerMechanicsGradePoints = $examOneGrade->points;
            return $examOnePowerMechanicsGradePoints;
        }
    }  
}

function examOneElectricitygGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::ELEC->value) && ($examOneGrade->from_mark <= $examOneMark->electricity) && ($examOneGrade->to_mark >= $examOneMark->electricity) && ($examOneMark->name === $markName)){
            $examOneElectricitygGradePoints = $examOneGrade->points;
            return $examOneElectricitygGradePoints;
        }
    }  
}

function examOneAviationTechnologyGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === SubjectsEnum::AVTEC->value) && ($examOneGrade->from_mark <= $examOneMark->aviation_technology) && ($examOneGrade->to_mark >= $examOneMark->aviation_technology) && ($examOneMark->name === $markName)){
            $examOneAviationTechnologyGradePoints = $examOneGrade->points;
            return $examOneAviationTechnologyGradePoints;
        }
    }  
}
//End of Exam One Mark Grade Points

//Start of Exam Two Mark Grade Points
/**
 * Exam Grade Points
 * @param App\Models\Year $yearId
 * @param App\Models\Term $termId
 * @param App\Models\Exam $examTwoMark
 * @param $markName
 * 
 * */
function examTwoMathsGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::MATHS->value) && ($examTwoGrade->from_mark <= $examTwoMark->mathematics) && ($examTwoGrade->to_mark >= $examTwoMark->mathematics) && ($examTwoMark->name === $markName)){
            $examTwoMathsGradePoints = $examTwoGrade->points;
            return $examTwoMathsGradePoints;
        }
    }
}

function examTwoEnglishGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::ENG->value) && ($examTwoGrade->from_mark <= $examTwoMark->english) && ($examTwoGrade->to_mark >= $examTwoMark->english) && ($examTwoMark->name === $markName)){
            $examTwoEnglishGradePoints = $examTwoGrade->points;
            return $examTwoEnglishGradePoints;
        }
    }
}

function examTwoKiswahiliGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::KISW->value) && ($examTwoGrade->from_mark <= $examTwoMark->kiswahili) && ($examTwoGrade->to_mark >= $examTwoMark->kiswahili) && ($examTwoMark->name === $markName)){
            $examTwoKiswahiliGradePoints = $examTwoGrade->points;
            return $examTwoKiswahiliGradePoints;
        }
    }
}

function examTwoChemistryGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::CHEM->value) && ($examTwoGrade->from_mark <= $examTwoMark->chemistry) && ($examTwoGrade->to_mark >= $examTwoMark->chemistry) && ($examTwoMark->name === $markName)){
            $examTwoChemistryGradePoints = $examTwoGrade->points;
            return $examTwoChemistryGradePoints;
        }
    }
}

function examTwoBiologyGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::BIO->value) && ($examTwoGrade->from_mark <= $examTwoMark->biology) && ($examTwoGrade->to_mark >= $examTwoMark->biology) && ($examTwoMark->name === $markName)){
            $examTwoBiologyGradePoints = $examTwoGrade->points;
            return $examTwoBiologyGradePoints;
        }
    }
}

function examTwoPhysicsGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::PHY->value) && ($examTwoGrade->from_mark <= $examTwoMark->physics) && ($examTwoGrade->to_mark >= $examTwoMark->physics) && ($examTwoMark->name === $markName)){
            $examTwoPhysicsGradePoints = $examTwoGrade->points;
            return $examTwoPhysicsGradePoints;
        }
    }
}

function examTwoCREGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::CRE->value) && ($examTwoGrade->from_mark <= $examTwoMark->cre) && ($examTwoGrade->to_mark >= $examTwoMark->cre) && ($examTwoMark->name === $markName)){
            $examTwoCREGradePoints = $examTwoGrade->points;
            return $examTwoCREGradePoints;
        }
    }
}

function examTwoIslamGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::ISLM->value) && ($examTwoGrade->from_mark <= $examTwoMark->islam) && ($examTwoGrade->to_mark >= $examTwoMark->islam) && ($examTwoMark->name === $markName)){
            $examTwoIslamGradePoints = $examTwoGrade->points;
            return $examTwoIslamGradePoints;
        }
    }
}

function examTwoHistoryAndGovernmentGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::HISTANDGOV->value) && ($examTwoGrade->from_mark <= $examTwoMark->history_and_government) && ($examTwoGrade->to_mark >= $examTwoMark->history_and_government) && ($examTwoMark->name === $markName)){
            $examTwoHistoryGradePoints = $examTwoGrade->points;
            return $examTwoHistoryGradePoints;
        }
    }
}

function examTwoGeographyGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::GEOG->value) && ($examTwoGrade->from_mark <= $examTwoMark->geography) && ($examTwoGrade->to_mark >= $examTwoMark->geography) && ($examTwoMark->name === $markName)){
            $examTwoGeogGradePoints = $examTwoGrade->points;
            return $examTwoGeogGradePoints;
        }
    }
}

function examTwoHomeScienceGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::HOMESC->value) && ($examTwoGrade->from_mark <= $examTwoMark->home_science) && ($examTwoGrade->to_mark >= $examTwoMark->home_science) && ($examTwoMark->name === $markName)){
            $examTwoHomeScienceGradePoints = $examTwoGrade->points;
            return $examTwoHomeScienceGradePoints;
        }
    }
}

function examTwoArtAndDesignGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::ARTDSGN->value) && ($examTwoGrade->from_mark <= $examTwoMark->art_and_design) && ($examTwoGrade->to_mark >= $examTwoMark->art_and_design) && ($examTwoMark->name === $markName)){
            $examTwoArtAndDesignGradePoints = $examTwoGrade->points;
            return $examTwoArtAndDesignGradePoints;
        }
    }
}

function examTwoAgricultureGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::AGRIC->value) && ($examTwoGrade->from_mark <= $examTwoMark->agriculture) && ($examTwoGrade->to_mark >= $examTwoMark->agriculture) && ($examTwoMark->name === $markName)){
            $examTwoAgricultureGradePoints = $examTwoGrade->points;
            return $examTwoAgricultureGradePoints;
        }
    }
}

function examTwoBusinessStudiesGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::BUZSTRDS->value) && ($examTwoGrade->from_mark <= $examTwoMark->business_studies) && ($examTwoGrade->to_mark >= $examTwoMark->business_studies) && ($examTwoMark->name === $markName)){
            $examTwoBusinessStudiesGradePoints = $examTwoGrade->points;
            return $examTwoBusinessStudiesGradePoints;
        }
    }
}

function examTwoComputerStudiesGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::COMPSTRDS->value) && ($examTwoGrade->from_mark <= $examTwoMark->computer_studies) && ($examTwoGrade->to_mark >= $examTwoMark->computer_studies) && ($examTwoMark->name === $markName)){
            $examTwoComputerStudiesGradePoints = $examTwoGrade->points;
            return $examTwoComputerStudiesGradePoints;
        }
    }
}

function examTwoDrawingAndDesignGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::DRWNDGN->value) && ($examTwoGrade->from_mark <= $examTwoMark->drawing_and_design) && ($examTwoGrade->to_mark >= $examTwoMark->drawing_and_design) && ($examTwoMark->name === $markName)){
            $examTwoDrawingAndDesignGradePoints = $examTwoGrade->points;
            return $examTwoDrawingAndDesignGradePoints;
        }
    }
}

function examTwoFrenchGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::FRNCH->value) && ($examTwoGrade->from_mark <= $examTwoMark->french) && ($examTwoGrade->to_mark >= $examTwoMark->french) && ($examTwoMark->name === $markName)){
            $examTwoFrenchGradePoints = $examTwoGrade->points;
            return $examTwoFrenchGradePoints;
        }
    }
}

function examTwoGermanGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::GRMN->value) && ($examTwoGrade->from_mark <= $examTwoMark->german) && ($examTwoGrade->to_mark >= $examTwoMark->german) && ($examTwoMark->name === $markName)){
            $examTwoGermanGradePoints = $examTwoGrade->points;
            return $examTwoGermanGradePoints;
        }
    }
}

function examTwoArabicGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::ARBC->value) && ($examTwoGrade->from_mark <= $examTwoMark->arabic) && ($examTwoGrade->to_mark >= $examTwoMark->arabic) && ($examTwoMark->name === $markName)){
            $examTwoArabicGradePoints = $examTwoGrade->points;
            return $examTwoArabicGradePoints;
        }
    }
}

function examTwoSignLanguageGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::SGNLANG->value) && ($examTwoGrade->from_mark <= $examTwoMark->sign_language) && ($examTwoGrade->to_mark >= $examTwoMark->sign_language) && ($examTwoMark->name === $markName)){
            $examTwoSignLanguageGradePoints = $examTwoGrade->points;
            return $examTwoSignLanguageGradePoints;
        }
    }
}

function examTwoMusicGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::MSC->value) && ($examTwoGrade->from_mark <= $examTwoMark->music) && ($examTwoGrade->to_mark >= $examTwoMark->music) && ($examTwoMark->name === $markName)){
            $examTwoMusicGradePoints = $examTwoGrade->points;
            return $examTwoMusicGradePoints;
        }
    }
}

function examTwoWoodWorkGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::WDWK->value) && ($examTwoGrade->from_mark <= $examTwoMark->wood_work) && ($examTwoGrade->to_mark >= $examTwoMark->wood_work) && ($examTwoMark->name === $markName)){
            $examTwoWoodWorkGradePoints = $examTwoGrade->points;
            return $examTwoWoodWorkGradePoints;
        }
    }
}

function examTwoMetalWorkGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::MTWK->value) && ($examTwoGrade->from_mark <= $examTwoMark->metal_work) && ($examTwoGrade->to_mark >= $examTwoMark->metal_work) && ($examTwoMark->name === $markName)){
            $examTwoMetalWorkGradePoints = $examTwoGrade->points;
            return $examTwoMetalWorkGradePoints;
        }
    }
}

function examTwoBuildingConstructionGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::BUILDCON->value) && ($examTwoGrade->from_mark <= $examTwoMark->building_construction) && ($examTwoGrade->to_mark >= $examTwoMark->building_construction) && ($examTwoMark->name === $markName)){
            $examTwoBuildingConstructionGradePoints = $examTwoGrade->points;
            return $examTwoBuildingConstructionGradePoints;
        }
    }
}

function examTwoPowerMechanicsGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::PWRMC->value) && ($examTwoGrade->from_mark <= $examTwoMark->power_mechanics) && ($examTwoGrade->to_mark >= $examTwoMark->power_mechanics) && ($examTwoMark->name === $markName)){
            $examTwoPowerMechanicsGradePoints = $examTwoGrade->points;
            return $examTwoPowerMechanicsGradePoints;
        }
    }
}

function examTwoElectricityGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::ELEC->value) && ($examTwoGrade->from_mark <= $examTwoMark->electricity) && ($examTwoGrade->to_mark >= $examTwoMark->electricity) && ($examTwoMark->name === $markName)){
            $examTwoElectricityGradePoints = $examTwoGrade->points;
            return $examTwoElectricityGradePoints;
        }
    }
}

function examTwoAviationTechnologyGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === SubjectsEnum::AVTEC->value) && ($examTwoGrade->from_mark <= $examTwoMark->aviation_technology) && ($examTwoGrade->to_mark >= $examTwoMark->aviation_technology) && ($examTwoMark->name === $markName)){
            $examTwoAviationTechnologyGradePoints = $examTwoGrade->points;
            return $examTwoAviationTechnologyGradePoints;
        }
    }
}
//End of Exam Two Mark Grade Points

//Start of Exam Three Mark Grade Points
/**
 * Exam Grade Points
 * @param App\Models\Year $yearId
 * @param App\Models\Term $termId
 * @param App\Models\Exam $examThreeMark
 * @param $markName
 * 
 **/
function examThreeMathsGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::MATHS->value) && ($examThreeGrade->from_mark <= $examThreeMark->mathematics) && ($examThreeGrade->to_mark >= $examThreeMark->mathematics) && ($examThreeMark->name === $markName)){
            $examThreeMathsGradePoints = $examThreeGrade->points;
            return $examThreeMathsGradePoints;
        }
    }
}

function examThreeEnglishGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::ENG->value) && ($examThreeGrade->from_mark <= $examThreeMark->english) && ($examThreeGrade->to_mark >= $examThreeMark->english) && ($examThreeMark->name === $markName)){
            $examThreeEnglishGradePoints = $examThreeGrade->points;
            return $examThreeEnglishGradePoints;
        }
    }
}

function examThreeKiswahiliGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::KISW->value) && ($examThreeGrade->from_mark <= $examThreeMark->kiswahili) && ($examThreeGrade->to_mark >= $examThreeMark->kiswahili) && ($examThreeMark->name === $markName)){
            $examThreeKiswahiliGradePoints = $examThreeGrade->points;
            return $examThreeKiswahiliGradePoints;
        }
    }
}

function examThreeChemistryGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::CHEM->value) && ($examThreeGrade->from_mark <= $examThreeMark->chemistry) && ($examThreeGrade->to_mark >= $examThreeMark->chemistry) && ($examThreeMark->name === $markName)){
            $examThreeChemistryGradePoints = $examThreeGrade->points;
            return $examThreeChemistryGradePoints;
        }
    }
}

function examThreeBiologyGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::BIO->value) && ($examThreeGrade->from_mark <= $examThreeMark->biology) && ($examThreeGrade->to_mark >= $examThreeMark->biology) && ($examThreeMark->name === $markName)){
            $examThreeBiologyGradePoints = $examThreeGrade->points;
            return $examThreeBiologyGradePoints;
        }
    }
}

function examThreePhysicsGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::PHY->value) && ($examThreeGrade->from_mark <= $examThreeMark->physics) && ($examThreeGrade->to_mark >= $examThreeMark->physics) && ($examThreeMark->name === $markName)){
            $examThreePhysicsGradePoints = $examThreeGrade->points;
            return $examThreePhysicsGradePoints;
        }
    }
}

function examThreeCREGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::CRE->value) && ($examThreeGrade->from_mark <= $examThreeMark->cre) && ($examThreeGrade->to_mark >= $examThreeMark->cre) && ($examThreeMark->name === $markName)){
            $examThreeCREGradePoints = $examThreeGrade->points;
            return $examThreeCREGradePoints;
        }
    }
}

function examThreeIslamGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::ISLM->value) && ($examThreeGrade->from_mark <= $examThreeMark->islam) && ($examThreeGrade->to_mark >= $examThreeMark->islam) && ($examThreeMark->name === $markName)){
            $examThreeIslamGradePoints = $examThreeGrade->points;
            return $examThreeIslamGradePoints;
        }
    }
}

function examThreeHistoryAndGovernmentGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::HISTANDGOV->value) && ($examThreeGrade->from_mark <= $examThreeMark->history_and_government) && ($examThreeGrade->to_mark >= $examThreeMark->history_and_government) && ($examThreeMark->name === $markName)){
            $examThreeHistoryGradePoints = $examThreeGrade->points;
            return $examThreeHistoryGradePoints;
        }
    }
}

function examThreeGeographyGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::GEOG->value) && ($examThreeGrade->from_mark <= $examThreeMark->geography) && ($examThreeGrade->to_mark >= $examThreeMark->geography) && ($examThreeMark->name === $markName)){
            $examThreeGeogGradePoints = $examThreeGrade->points;
            return $examThreeGeogGradePoints;
        }
    }
}

function examThreeHomeScienceGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::HOMESC->value) && ($examThreeGrade->from_mark <= $examThreeMark->home_science) && ($examThreeGrade->to_mark >= $examThreeMark->home_science) && ($examThreeMark->name === $markName)){
            $examThreeHomeScienceGradePoints = $examThreeGrade->points;
            return $examThreeHomeScienceGradePoints;
        }
    }
}

function examThreeArtAndDesignGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::ARTDSGN->value) && ($examThreeGrade->from_mark <= $examThreeMark->art_and_design) && ($examThreeGrade->to_mark >= $examThreeMark->art_and_design) && ($examThreeMark->name === $markName)){
            $examThreeArtAndDesignGradePoints = $examThreeGrade->points;
            return $examThreeArtAndDesignGradePoints;
        }
    }
}

function examThreeAgricultureGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::AGRIC->value) && ($examThreeGrade->from_mark <= $examThreeMark->agriculture) && ($examThreeGrade->to_mark >= $examThreeMark->agriculture) && ($examThreeMark->name === $markName)){
            $examThreeAgricultureGradePoints = $examThreeGrade->points;
            return $examThreeAgricultureGradePoints;
        }
    }
}

function examThreeBusinessStudiesGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::BUZSTRDS->value) && ($examThreeGrade->from_mark <= $examThreeMark->business_studies) && ($examThreeGrade->to_mark >= $examThreeMark->business_studies) && ($examThreeMark->name === $markName)){
            $examThreeBusinessStudiesGradePoints = $examThreeGrade->points;
            return $examThreeBusinessStudiesGradePoints;
        }
    }
}

function examThreeComputerStudiesGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::COMPSTRDS->value) && ($examThreeGrade->from_mark <= $examThreeMark->computer_studies) && ($examThreeGrade->to_mark >= $examThreeMark->computer_studies) && ($examThreeMark->name === $markName)){
            $examThreeComputerStudiesGradePoints = $examThreeGrade->points;
            return $examThreeComputerStudiesGradePoints;
        }
    }
}

function examThreeDrawingAndDesignGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::DRWNDGN->value) && ($examThreeGrade->from_mark <= $examThreeMark->drawing_and_design) && ($examThreeGrade->to_mark >= $examThreeMark->drawing_and_design) && ($examThreeMark->name === $markName)){
            $examThreeDrawingAndDesignGradePoints = $examThreeGrade->points;
            return $examThreeDrawingAndDesignGradePoints;
        }
    }
}

function examThreeFrenchGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::FRNCH->value) && ($examThreeGrade->from_mark <= $examThreeMark->french) && ($examThreeGrade->to_mark >= $examThreeMark->french) && ($examThreeMark->name === $markName)){
            $examThreeFrenchGradePoints = $examThreeGrade->points;
            return $examThreeFrenchGradePoints;
        }
    }
}

function examThreeGermanGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::GRMN->value) && ($examThreeGrade->from_mark <= $examThreeMark->german) && ($examThreeGrade->to_mark >= $examThreeMark->german) && ($examThreeMark->name === $markName)){
            $examThreeGermanGradePoints = $examThreeGrade->points;
            return $examThreeGermanGradePoints;
        }
    }
}

function examThreeArabicGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::ARBC->value) && ($examThreeGrade->from_mark <= $examThreeMark->arabic) && ($examThreeGrade->to_mark >= $examThreeMark->arabic) && ($examThreeMark->name === $markName)){
            $examThreeArabicGradePoints = $examThreeGrade->points;
            return $examThreeArabicGradePoints;
        }
    }
}

function examThreeSignLanguageGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::SGNLANG->value) && ($examThreeGrade->from_mark <= $examThreeMark->sign_language) && ($examThreeGrade->to_mark >= $examThreeMark->sign_language) && ($examThreeMark->name === $markName)){
            $examThreeSignLanguageGradePoints = $examThreeGrade->points;
            return $examThreeSignLanguageGradePoints;
        }
    }
}

function examThreeMusicGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::MSC->value) && ($examThreeGrade->from_mark <= $examThreeMark->music) && ($examThreeGrade->to_mark >= $examThreeMark->music) && ($examThreeMark->name === $markName)){
            $examThreeMusicGradePoints = $examThreeGrade->points;
            return $examThreeMusicGradePoints;
        }
    }
}

function examThreeWoodWorkGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::WDWK->value) && ($examThreeGrade->from_mark <= $examThreeMark->wood_work) && ($examThreeGrade->to_mark >= $examThreeMark->wood_work) && ($examThreeMark->name === $markName)){
            $examThreeWoodWorkGradePoints = $examThreeGrade->points;
            return $examThreeWoodWorkGradePoints;
        }
    }
}

function examThreeMetalWorkGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::MTWK->value) && ($examThreeGrade->from_mark <= $examThreeMark->metal_work) && ($examThreeGrade->to_mark >= $examThreeMark->metal_work) && ($examThreeMark->name === $markName)){
            $examThreeMetalWorkGradePoints = $examThreeGrade->points;
            return $examThreeMetalWorkGradePoints;
        }
    }
}

function examThreeBuildingConstructionGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::BUILDCON->value) && ($examThreeGrade->from_mark <= $examThreeMark->building_construction) && ($examThreeGrade->to_mark >= $examThreeMark->building_construction) && ($examThreeMark->name === $markName)){
            $examThreeBuildingConstructionGradePoints = $examThreeGrade->points;
            return $examThreeBuildingConstructionGradePoints;
        }
    }
}

function examThreePowerMechanicsGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::PWRMC->value) && ($examThreeGrade->from_mark <= $examThreeMark->power_mechanics) && ($examThreeGrade->to_mark >= $examThreeMark->power_mechanics) && ($examThreeMark->name === $markName)){
            $examThreePowerMechanicsGradePoints = $examThreeGrade->points;
            return $examThreePowerMechanicsGradePoints;
        }
    }
}

function examThreeElectricityGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::ELEC->value) && ($examThreeGrade->from_mark <= $examThreeMark->electricity) && ($examThreeGrade->to_mark >= $examThreeMark->electricity) && ($examThreeMark->name === $markName)){
            $examThreeElectricityGradePoints = $examThreeGrade->points;
            return $examThreeElectricityGradePoints;
        }
    }
}

function examThreeAviationTechnologyGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === SubjectsEnum::AVTEC->value) && ($examThreeGrade->from_mark <= $examThreeMark->aviation_technology) && ($examThreeGrade->to_mark >= $examThreeMark->aviation_technology) && ($examThreeMark->name === $markName)){
            $examThreeAviationTechnologyGradePoints = $examThreeGrade->points;
            return $examThreeAviationTechnologyGradePoints;
        }
    }
}

//End of Exam Three Mark Grade Points


//Exam one mark general grades computation
function examOneGeneralGrades($examOneMark)
{
    $examOneGenGrades = GeneralGrade::where(['exam_id'=>$examOneMark->exam->id,'term_id'=>$examOneMark->term->id,'year_id'=>$examOneMark->year->id])->with('exam','term','year')->get();

    return $examOneGenGrades;
}


//Exam one mark general grade computation
function examOneGeneralGrade($examOneMark,$examOne,$examOneTotal)
{
    $subjectsTakenPerClass = $examOneMark->class->number_of_subjects_per_class;
    $examOneGenGrades = examOneGeneralGrades($examOneMark);
    if(!empty($examOneGenGrades)){
        foreach($examOneGenGrades as $examOneGenGrade){
            if((($examOneGenGrade->from_mark) <= (round($examOneTotal/$subjectsTakenPerClass,0))) && (($examOneGenGrade->to_mark) >= (round($examOneTotal/$subjectsTakenPerClass,0))) && ($examOneGenGrade->exam->id === $examOne->id)){
                $examOneGrade = $examOneGenGrade->grade;

                return $examOneGrade;
            }
        }
    }   
}


//Exam Two mark general grades computation
function examTwoGeneralGrades($examTwoMark)
{
    $examTwoGenGrades = GeneralGrade::where(['exam_id'=>$examTwoMark->exam->id,'term_id'=>$examTwoMark->term->id,'year_id'=>$examTwoMark->year->id])->with('exam','term','year')->get();

    return $examTwoGenGrades;
}


//Exam Two mark general grade computation
function examTwoGeneralGrade($examTwoMark,$examTwo,$examTwoTotal)
{
    $subjectsTakenPerClass = $examTwoMark->class->number_of_subjects_per_class;
    $examTwoGenGrades = examTwoGeneralGrades($examTwoMark);
    if(!empty($examTwoGenGrades)){
        foreach($examTwoGenGrades as $examTwoGenGrade){
            if((($examTwoGenGrade->from_mark) <= (round($examTwoTotal/$subjectsTakenPerClass,0))) && (($examTwoGenGrade->to_mark) >= (round($examTwoTotal/$subjectsTakenPerClass,0))) && ($examTwoGenGrade->exam->id === $examTwo->id)){
                $examTwoGrade = $examTwoGenGrade->grade;

                return $examTwoGrade;
            }
        }
    }  
}


//Exam Three mark general grades computation
function examThreeGeneralGrades($examThreeMark)
{
    $examThreeGenGrades = GeneralGrade::where(['exam_id'=>$examThreeMark->exam->id,'term_id'=>$examThreeMark->term->id,'year_id'=>$examThreeMark->year->id])->with('exam','term','year')->get();

    return $examThreeGenGrades;
}


//Exam Three mark general grade computation
function examThreeGeneralGrade($examThreeMark,$examThree,$examThreeTotal)
{
    $subjectsTakenPerClass = $examThreeMark->class->number_of_subjects_per_class;
    $examThreeGenGrades = examThreeGeneralGrades($examThreeMark);
    if(!empty($examThreeGenGrades)){
        foreach($examThreeGenGrades as $examThreeGenGrade){
            if((($examThreeGenGrade->from_mark) <= (round($examThreeTotal/$subjectsTakenPerClass,0))) && (($examThreeGenGrade->to_mark) >= (round($examThreeTotal/$subjectsTakenPerClass,0))) && ($examThreeGenGrade->exam->id === $examThree->id)){
                $examThreeGrade = $examThreeGenGrade->grade;

                return $examThreeGrade;
            }
        }
    }
}


//Report Card general remark computation
function reportGeneralRemark($yearId,$termId,$stream,$year,$term,$overalTotalAvg)
{
    //General Report Card Remarks
    $reportCardRemarks = ReportRemark::where(['year_id'=>$yearId,'term_id'=>$termId,'class_id'=>$stream->class->id])->with('school','year','term','class')->get();
    if(!empty($reportCardRemarks)){
        foreach($reportCardRemarks as $reportCardRemark){
            if(($reportCardRemark->from_total <= round($overalTotalAvg,0)) && ($reportCardRemark->to_total >= round($overalTotalAvg,0)) && ($reportCardRemark->year->id === $year->id) && ($reportCardRemark->term->id === $term->id) && ($reportCardRemark->class->id === $stream->class->id)){
                $reportGeneralRemark = $reportCardRemark->remark;

                return $reportGeneralRemark;
            }
        }
    }
}
