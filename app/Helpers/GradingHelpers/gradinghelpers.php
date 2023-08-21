<?php

use App\Models\Mark;
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Models\ReportComment;
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

function examOneGrades($examOneMark)
{
    $examOneGrades = Grade::where(['exam_id'=>$examOneMark->exam->id,'term_id'=>$examOneMark->term->id,'year_id'=>$examOneMark->year->id])->with('school','class','stream','exam','term','year','teacher','subject')->get();
        
    return $examOneGrades;
}

function examOneMathsGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Mathematics') && ($examOneGrade->from_mark <= $examOneMark->mathematics) && ($examOneGrade->to_mark >= $examOneMark->mathematics) && ($examOneMark->name === $markName)){
            $mathsGrade = $examOneGrade->grade;
            return $mathsGrade;
        }
    }
}

function examOneEnglishGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'English') && ($examOneGrade->from_mark <= $examOneMark->english) && ($examOneGrade->to_mark >= $examOneMark->english) && ($examOneMark->name === $markName)){
            $englishGrade = $examOneGrade->grade;
            return $englishGrade;
        }
    }  
}

function examOneKiswahiliGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Kiswahili') && ($examOneGrade->from_mark <= $examOneMark->kiswahili) && ($examOneGrade->to_mark >= $examOneMark->kiswahili) && ($examOneMark->name === $markName)){
            $kiswGrade = $examOneGrade->grade;
            return $kiswGrade;
        }
    }  
}

function examOneChemistryGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Chemistry') && ($examOneGrade->from_mark <= $examOneMark->chemistry) && ($examOneGrade->to_mark >= $examOneMark->chemistry) && ($examOneMark->name === $markName)){
            $chemGrade = $examOneGrade->grade;
            return $chemGrade;
        }
    }  
}

function examOneBiologyGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Biology') && ($examOneGrade->from_mark <= $examOneMark->biology) && ($examOneGrade->to_mark >= $examOneMark->biology) && ($examOneMark->name === $markName)){
            $bioGrade = $examOneGrade->grade;
            return $bioGrade;
        }
    }  
}

function examOnePhysicsGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Physics') && ($examOneGrade->from_mark <= $examOneMark->physics) && ($examOneGrade->to_mark >= $examOneMark->physics) && ($examOneMark->name === $markName)){
            $physicsGrade = $examOneGrade->grade;
            return $physicsGrade;
        }
    }  
}

function examOneCREGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'CRE') && ($examOneGrade->from_mark <= $examOneMark->cre) && ($examOneGrade->to_mark >= $examOneMark->cre) && ($examOneMark->name === $markName)){
            $creGrade = $examOneGrade->grade;
            return $creGrade;
        }
    }  
}

function examOneIslamGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Islam') && ($examOneGrade->from_mark <= $examOneMark->islam) && ($examOneGrade->to_mark >= $examOneMark->islam) && ($examOneMark->name === $markName)){
            $islamGrade = $examOneGrade->grade;
            return $islamGrade;
        }
    }  
}

function examOneHistoryGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'History') && ($examOneGrade->from_mark <= $examOneMark->history) && ($examOneGrade->to_mark >= $examOneMark->history) && ($examOneMark->name === $markName)){
            $histGrade = $examOneGrade->grade;
            return $histGrade;
        }
    }  
}

function examOneGHCGrade($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'GHC') && ($examOneGrade->from_mark <= $examOneMark->ghc) && ($examOneGrade->to_mark >= $examOneMark->ghc) && ($examOneMark->name === $markName)){
            $ghcGrade = $examOneGrade->grade;
            return $ghcGrade;
        }
    }  
}

function examTwoGrades($examTwoMark)
{
    $examTwoGrades = Grade::where(['exam_id'=>$examTwoMark->exam->id,'term_id'=>$examTwoMark->term->id,'year_id'=>$examTwoMark->year->id])->with('school','class','stream','exam','term','year','teacher','subject')->get();
        
    return $examTwoGrades;
}

function examTwoMathsGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Mathematics') && ($examTwoGrade->from_mark <= $examTwoMark->mathematics) && ($examTwoGrade->to_mark >= $examTwoMark->mathematics) && ($examTwoMark->name === $markName)){
            $mathsGrade = $examTwoGrade->grade;
            return $mathsGrade;
        }
    }
}

function examTwoEnglishGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'English') && ($examTwoGrade->from_mark <= $examTwoMark->english) && ($examTwoGrade->to_mark >= $examTwoMark->english) && ($examTwoMark->name === $markName)){
            $englishGrade = $examTwoGrade->grade;
            return $englishGrade;
        }
    }
}

function examTwoKiswahiliGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Kiswahili') && ($examTwoGrade->from_mark <= $examTwoMark->kiswahili) && ($examTwoGrade->to_mark >= $examTwoMark->kiswahili) && ($examTwoMark->name === $markName)){
            $kiswGrade = $examTwoGrade->grade;
            return $kiswGrade;
        }
    }
}

function examTwoChemistryGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Chemistry') && ($examTwoGrade->from_mark <= $examTwoMark->chemistry) && ($examTwoGrade->to_mark >= $examTwoMark->chemistry) && ($examTwoMark->name === $markName)){
            $chemGrade = $examTwoGrade->grade;
            return $chemGrade;
        }
    }
}

function examTwoBiologyGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Biology') && ($examTwoGrade->from_mark <= $examTwoMark->biology) && ($examTwoGrade->to_mark >= $examTwoMark->biology) && ($examTwoMark->name === $markName)){
            $bioGrade = $examTwoGrade->grade;
            return $bioGrade;
        }
    }
}

function examTwoPhysicsGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Physics') && ($examTwoGrade->from_mark <= $examTwoMark->physics) && ($examTwoGrade->to_mark >= $examTwoMark->physics) && ($examTwoMark->name === $markName)){
            $physicsGrade = $examTwoGrade->grade;
            return $physicsGrade;
        }
    }
}

function examTwoCREGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'CRE') && ($examTwoGrade->from_mark <= $examTwoMark->cre) && ($examTwoGrade->to_mark >= $examTwoMark->cre) && ($examTwoMark->name === $markName)){
            $creGrade = $examTwoGrade->grade;
            return $creGrade;
        }
    }
}

function examTwoIslamGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Islam') && ($examTwoGrade->from_mark <= $examTwoMark->islam) && ($examTwoGrade->to_mark >= $examTwoMark->islam) && ($examTwoMark->name === $markName)){
            $islamGrade = $examTwoGrade->grade;
            return $islamGrade;
        }
    }
}

function examTwoHistoryGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'History') && ($examTwoGrade->from_mark <= $examTwoMark->history) && ($examTwoGrade->to_mark >= $examTwoMark->history) && ($examTwoMark->name === $markName)){
            $histGrade = $examTwoGrade->grade;
            return $histGrade;
        }
    }
}

function examTwoGHCGrade($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'GHC') && ($examTwoGrade->from_mark <= $examTwoMark->ghc) && ($examTwoGrade->to_mark >= $examTwoMark->ghc) && ($examTwoMark->name === $markName)){
            $ghcGrade = $examTwoGrade->grade;
            return $ghcGrade;
        }
    }
}

function examThreeGrades($examThreeMark)
{
    $examThreeGrades = Grade::where(['exam_id'=>$examThreeMark->exam->id,'term_id'=>$examThreeMark->term->id,'year_id'=>$examThreeMark->year->id])->with('school','class','stream','exam','term','year','teacher','subject')->get();
        
    return $examThreeGrades;
}

function examThreeMathsGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Mathematics') && ($examThreeGrade->from_mark <= $examThreeMark->mathematics) && ($examThreeGrade->to_mark >= $examThreeMark->mathematics) && ($examThreeMark->name === $markName)){
            $mathsGrade = $examThreeGrade->grade;
            return $mathsGrade;
        }
    }
}

function examThreeEnglishGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'English') && ($examThreeGrade->from_mark <= $examThreeMark->english) && ($examThreeGrade->to_mark >= $examThreeMark->english) && ($examThreeMark->name === $markName)){
            $englishGrade = $examThreeGrade->grade;
            return $englishGrade;
        }
    }
}

function examThreeKiswahiliGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Kiswahili') && ($examThreeGrade->from_mark <= $examThreeMark->kiswahili) && ($examThreeGrade->to_mark >= $examThreeMark->kiswahili) && ($examThreeMark->name === $markName)){
            $kiswGrade = $examThreeGrade->grade;
            return $kiswGrade;
        }
    }
}

function examThreeChemistryGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Chemistry') && ($examThreeGrade->from_mark <= $examThreeMark->chemistry) && ($examThreeGrade->to_mark >= $examThreeMark->chemistry) && ($examThreeMark->name === $markName)){
            $chemGrade = $examThreeGrade->grade;
            return $chemGrade;
        }
    }
}

function examThreeBiologyGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Biology') && ($examThreeGrade->from_mark <= $examThreeMark->biology) && ($examThreeGrade->to_mark >= $examThreeMark->biology) && ($examThreeMark->name === $markName)){
            $bioGrade = $examThreeGrade->grade;
            return $bioGrade;
        }
    }
}

function examThreePhysicsGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Physics') && ($examThreeGrade->from_mark <= $examThreeMark->physics) && ($examThreeGrade->to_mark >= $examThreeMark->physics) && ($examThreeMark->name === $markName)){
            $physicsGrade = $examThreeGrade->grade;
            return $physicsGrade;
        }
    }
}

function examThreeCREGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'CRE') && ($examThreeGrade->from_mark <= $examThreeMark->cre) && ($examThreeGrade->to_mark >= $examThreeMark->cre) && ($examThreeMark->name === $markName)){
            $creGrade = $examThreeGrade->grade;
            return $creGrade;
        }
    }
}

function examThreeIslamGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Islam') && ($examThreeGrade->from_mark <= $examThreeMark->islam) && ($examThreeGrade->to_mark >= $examThreeMark->islam) && ($examThreeMark->name === $markName)){
            $islamGrade = $examThreeGrade->grade;
            return $islamGrade;
        }
    }
}

function examThreeHistoryGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'History') && ($examThreeGrade->from_mark <= $examThreeMark->history) && ($examThreeGrade->to_mark >= $examThreeMark->history) && ($examThreeMark->name === $markName)){
            $histGrade = $examThreeGrade->grade;
            return $histGrade;
        }
    }
}

function examThreeGHCGrade($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'GHC') && ($examThreeGrade->from_mark <= $examThreeMark->ghc) && ($examThreeGrade->to_mark >= $examThreeMark->ghc) && ($examThreeMark->name === $markName)){
            $ghcGrade = $examThreeGrade->grade;
            return $ghcGrade;
        }
    }
}

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
        if(($examOneGrade->subject->name === 'Mathematics') && ($examOneGrade->from_mark <= $examOneMark->mathematics) && ($examOneGrade->to_mark >= $examOneMark->mathematics) && ($examOneMark->name === $markName)){
            $mathsGradePoints = $examOneGrade->points;
            return $mathsGradePoints;
        }
    }
}

function examOneEnglishGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'English') && ($examOneGrade->from_mark <= $examOneMark->english) && ($examOneGrade->to_mark >= $examOneMark->english) && ($examOneMark->name === $markName)){
            $englishGradePoints = $examOneGrade->points;
            return $englishGradePoints;
        }
    }  
}

function examOneKiswahiliGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Kiswahili') && ($examOneGrade->from_mark <= $examOneMark->kiswahili) && ($examOneGrade->to_mark >= $examOneMark->kiswahili) && ($examOneMark->name === $markName)){
            $kiswGradePoints = $examOneGrade->points;
            return $kiswGradePoints;
        }
    }  
}

function examOneChemistryGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Chemistry') && ($examOneGrade->from_mark <= $examOneMark->chemistry) && ($examOneGrade->to_mark >= $examOneMark->chemistry) && ($examOneMark->name === $markName)){
            $chemGradePoints = $examOneGrade->points;
            return $chemGradePoints;
        }
    }  
}

function examOneBiologyGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Biology') && ($examOneGrade->from_mark <= $examOneMark->biology) && ($examOneGrade->to_mark >= $examOneMark->biology) && ($examOneMark->name === $markName)){
            $bioGradePoints = $examOneGrade->points;
            return $bioGradePoints;
        }
    }  
}

function examOnePhysicsGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Physics') && ($examOneGrade->from_mark <= $examOneMark->physics) && ($examOneGrade->to_mark >= $examOneMark->physics) && ($examOneMark->name === $markName)){
            $physicsGradePoints = $examOneGrade->points;
            return $physicsGradePoints;
        }
    }  
}

function examOneCREGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'CRE') && ($examOneGrade->from_mark <= $examOneMark->cre) && ($examOneGrade->to_mark >= $examOneMark->cre) && ($examOneMark->name === $markName)){
            $creGradePoints = $examOneGrade->points;
            return $creGradePoints;
        }
    }  
}

function examOneIslamGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'Islam') && ($examOneGrade->from_mark <= $examOneMark->islam) && ($examOneGrade->to_mark >= $examOneMark->islam) && ($examOneMark->name === $markName)){
            $islamGradePoints = $examOneGrade->points;
            return $islamGradePoints;
        }
    }  
}

function examOneHistoryGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'History') && ($examOneGrade->from_mark <= $examOneMark->history) && ($examOneGrade->to_mark >= $examOneMark->history) && ($examOneMark->name === $markName)){
            $histGradePoints = $examOneGrade->points;
            return $histGradePoints;
        }
    }  
}

function examOneGHCGradePoints($examOneMark,$markName)
{
    $examOneGrades = examOneGrades($examOneMark);
    foreach($examOneGrades as $examOneGrade){
        if(($examOneGrade->subject->name === 'GHC') && ($examOneGrade->from_mark <= $examOneMark->ghc) && ($examOneGrade->to_mark >= $examOneMark->ghc) && ($examOneMark->name === $markName)){
            $ghcGradePoints = $examOneGrade->points;
            return $ghcGradePoints;
        }
    }  
}

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
        if(($examTwoGrade->subject->name === 'Mathematics') && ($examTwoGrade->from_mark <= $examTwoMark->mathematics) && ($examTwoGrade->to_mark >= $examTwoMark->mathematics) && ($examTwoMark->name === $markName)){
            $mathsGradePoints = $examTwoGrade->points;
            return $mathsGradePoints;
        }
    }
}

function examTwoEnglishGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'English') && ($examTwoGrade->from_mark <= $examTwoMark->english) && ($examTwoGrade->to_mark >= $examTwoMark->english) && ($examTwoMark->name === $markName)){
            $englishGradePoints = $examTwoGrade->points;
            return $englishGradePoints;
        }
    }
}

function examTwoKiswahiliGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Kiswahili') && ($examTwoGrade->from_mark <= $examTwoMark->kiswahili) && ($examTwoGrade->to_mark >= $examTwoMark->kiswahili) && ($examTwoMark->name === $markName)){
            $kiswGradePoints = $examTwoGrade->points;
            return $kiswGradePoints;
        }
    }
}

function examTwoChemistryGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Chemistry') && ($examTwoGrade->from_mark <= $examTwoMark->chemistry) && ($examTwoGrade->to_mark >= $examTwoMark->chemistry) && ($examTwoMark->name === $markName)){
            $chemGradePoints = $examTwoGrade->points;
            return $chemGradePoints;
        }
    }
}

function examTwoBiologyGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Biology') && ($examTwoGrade->from_mark <= $examTwoMark->biology) && ($examTwoGrade->to_mark >= $examTwoMark->biology) && ($examTwoMark->name === $markName)){
            $bioGradePoints = $examTwoGrade->points;
            return $bioGradePoints;
        }
    }
}

function examTwoPhysicsGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Physics') && ($examTwoGrade->from_mark <= $examTwoMark->physics) && ($examTwoGrade->to_mark >= $examTwoMark->physics) && ($examTwoMark->name === $markName)){
            $physicsGradePoints = $examTwoGrade->points;
            return $physicsGradePoints;
        }
    }
}

function examTwoCREGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'CRE') && ($examTwoGrade->from_mark <= $examTwoMark->cre) && ($examTwoGrade->to_mark >= $examTwoMark->cre) && ($examTwoMark->name === $markName)){
            $creGradePoints = $examTwoGrade->points;
            return $creGradePoints;
        }
    }
}

function examTwoIslamGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'Islam') && ($examTwoGrade->from_mark <= $examTwoMark->islam) && ($examTwoGrade->to_mark >= $examTwoMark->islam) && ($examTwoMark->name === $markName)){
            $islamGradePoints = $examTwoGrade->points;
            return $islamGradePoints;
        }
    }
}

function examTwoHistoryGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'History') && ($examTwoGrade->from_mark <= $examTwoMark->history) && ($examTwoGrade->to_mark >= $examTwoMark->history) && ($examTwoMark->name === $markName)){
            $histGradePoints = $examTwoGrade->points;
            return $histGradePoints;
        }
    }
}

function examTwoGHCGradePoints($examTwoMark,$markName)
{
    $examTwoGrades = examTwoGrades($examTwoMark);
    foreach($examTwoGrades as $examTwoGrade){
        if(($examTwoGrade->subject->name === 'GHC') && ($examTwoGrade->from_mark <= $examTwoMark->ghc) && ($examTwoGrade->to_mark >= $examTwoMark->ghc) && ($examTwoMark->name === $markName)){
            $ghcGradePoints = $examTwoGrade->points;
            return $ghcGradePoints;
        }
    }
}

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
        if(($examThreeGrade->subject->name === 'Mathematics') && ($examThreeGrade->from_mark <= $examThreeMark->mathematics) && ($examThreeGrade->to_mark >= $examThreeMark->mathematics) && ($examThreeMark->name === $markName)){
            $mathsGradePoints = $examThreeGrade->points;
            return $mathsGradePoints;
        }
    }
}

function examThreeEnglishGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'English') && ($examThreeGrade->from_mark <= $examThreeMark->english) && ($examThreeGrade->to_mark >= $examThreeMark->english) && ($examThreeMark->name === $markName)){
            $englishGradePoints = $examThreeGrade->points;
            return $englishGradePoints;
        }
    }
}

function examThreeKiswahiliGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Kiswahili') && ($examThreeGrade->from_mark <= $examThreeMark->kiswahili) && ($examThreeGrade->to_mark >= $examThreeMark->kiswahili) && ($examThreeMark->name === $markName)){
            $kiswGradePoints = $examThreeGrade->points;
            return $kiswGradePoints;
        }
    }
}

function examThreeChemistryGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Chemistry') && ($examThreeGrade->from_mark <= $examThreeMark->chemistry) && ($examThreeGrade->to_mark >= $examThreeMark->chemistry) && ($examThreeMark->name === $markName)){
            $chemGradePoints = $examThreeGrade->points;
            return $chemGradePoints;
        }
    }
}

function examThreeBiologyGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Biology') && ($examThreeGrade->from_mark <= $examThreeMark->biology) && ($examThreeGrade->to_mark >= $examThreeMark->biology) && ($examThreeMark->name === $markName)){
            $bioGradePoints = $examThreeGrade->points;
            return $bioGradePoints;
        }
    }
}

function examThreePhysicsGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Physics') && ($examThreeGrade->from_mark <= $examThreeMark->physics) && ($examThreeGrade->to_mark >= $examThreeMark->physics) && ($examThreeMark->name === $markName)){
            $physicsGradePoints = $examThreeGrade->points;
            return $physicsGradePoints;
        }
    }
}

function examThreeCREGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'CRE') && ($examThreeGrade->from_mark <= $examThreeMark->cre) && ($examThreeGrade->to_mark >= $examThreeMark->cre) && ($examThreeMark->name === $markName)){
            $creGradePoints = $examThreeGrade->points;
            return $creGradePoints;
        }
    }
}

function examThreeIslamGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'Islam') && ($examThreeGrade->from_mark <= $examThreeMark->islam) && ($examThreeGrade->to_mark >= $examThreeMark->islam) && ($examThreeMark->name === $markName)){
            $islamGradePoints = $examThreeGrade->points;
            return $islamGradePoints;
        }
    }
}

function examThreeHistoryGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'History') && ($examThreeGrade->from_mark <= $examThreeMark->history) && ($examThreeGrade->to_mark >= $examThreeMark->history) && ($examThreeMark->name === $markName)){
            $histGradePoints = $examThreeGrade->points;
            return $histGradePoints;
        }
    }
}

function examThreeGHCGradePoints($examThreeMark,$markName)
{
    $examThreeGrades = examThreeGrades($examThreeMark);
    foreach($examThreeGrades as $examThreeGrade){
        if(($examThreeGrade->subject->name === 'GHC') && ($examThreeGrade->from_mark <= $examThreeMark->ghc) && ($examThreeGrade->to_mark >= $examThreeMark->ghc) && ($examThreeMark->name === $markName)){
            $ghcGradePoints = $examThreeGrade->points;
            return $ghcGradePoints;
        }
    }
}

function examOneGeneralGrades($examOneMark)
{
    $examOneGenGrades = GeneralGrade::where(['exam_id'=>$examOneMark->exam->id,'term_id'=>$examOneMark->term->id,'year_id'=>$examOneMark->year->id])->with('exam','term','year')->get();

    return $examOneGenGrades;
}

function examOneGeneralGrade($examOneMark,$examOne,$examOneTotal)
{
    $examOneGenGrades = examOneGeneralGrades($examOneMark);
    if(!empty($examOneGenGrades)){
        foreach($examOneGenGrades as $examOneGenGrade){
            if((($examOneGenGrade->from_mark) <= (round($examOneTotal/5,0))) && (($examOneGenGrade->to_mark) >= (round($examOneTotal/5,0))) && ($examOneGenGrade->exam->id === $examOne->id)){
                $examOneGrade = $examOneGenGrade->grade;

                return $examOneGrade;
            }
        }
    }   
}

function examTwoGeneralGrades($examTwoMark)
{
    $examTwoGenGrades = GeneralGrade::where(['exam_id'=>$examTwoMark->exam->id,'term_id'=>$examTwoMark->term->id,'year_id'=>$examTwoMark->year->id])->with('exam','term','year')->get();

    return $examTwoGenGrades;
}

function examTwoGeneralGrade($examTwoMark,$examTwo,$examTwoTotal)
{
    $examTwoGenGrades = examTwoGeneralGrades($examTwoMark);
    if(!empty($examTwoGenGrades)){
        foreach($examTwoGenGrades as $examTwoGenGrade){
            if((($examTwoGenGrade->from_mark) <= (round($examTwoTotal/5,0))) && (($examTwoGenGrade->to_mark) >= (round($examTwoTotal/5,0))) && ($examTwoGenGrade->exam->id === $examTwo->id)){
                $examTwoGrade = $examTwoGenGrade->grade;

                return $examTwoGrade;
            }
        }
    }  
}

function examThreeGeneralGrades($examThreeMark)
{
    $examThreeGenGrades = GeneralGrade::where(['exam_id'=>$examThreeMark->exam->id,'term_id'=>$examThreeMark->term->id,'year_id'=>$examThreeMark->year->id])->with('exam','term','year')->get();

    return $examThreeGenGrades;
}

function examThreeGeneralGrade($examThreeMark,$examThree,$examThreeTotal)
{
    $examThreeGenGrades = examThreeGeneralGrades($examThreeMark);
    if(!empty($examThreeGenGrades)){
        foreach($examThreeGenGrades as $examThreeGenGrade){
            if((($examThreeGenGrade->from_mark) <= (round($examThreeTotal/5,0))) && (($examThreeGenGrade->to_mark) >= (round($examThreeTotal/5,0))) && ($examThreeGenGrade->exam->id === $examThree->id)){
                $examThreeGrade = $examThreeGenGrade->grade;

                return $examThreeGrade;
            }
        }
    }
}

function reportCardComment($yearId,$termId,$stream,$year,$term,$overalTotalAvg)
{
    //General Report Card Comments
    $reportCardComments = ReportComment::where(['year_id'=>$yearId,'term_id'=>$termId,'class_id'=>$stream->class->id])->with('school','year','term','exam','class')->get();
    if(!empty($reportCardComments)){
        foreach($reportCardComments as $comment){
            if(($comment->from_total <= round($overalTotalAvg,0)) && ($comment->to_total >= round($overalTotalAvg,0)) && ($comment->year->id === $year->id) && ($comment->term->id === $term->id) && ($comment->class->id === $stream->class->id)){
                $reportCardComment = $comment->comment;

                return $reportCardComment;
            }
        }
    }
}
