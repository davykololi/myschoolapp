<?php

namespace App\Services;

use Auth;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Term;
use App\Models\Year;
use App\Models\ClassTotal;
use App\Models\StreamTotal;
use App\Models\Grade;
use App\Models\GeneralGrade;
use Illuminate\Http\Request;

class GradeService
{
	public function __construct()
	{
		
	}

	public function getData($yearId,$termId,$classId,$streamId,$examOneMark,$examTwoMark,$examThreeMark,$name)
	{
		// Exam One Subject Grades
        $data['examOneMathsGrade'] = examOneMathsGrade($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examOneEnglishGrade'] = examOneEnglishGrade($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examOneKiswGrade'] = examOneKiswahiliGrade($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examOneChemGrade'] = examOneChemistryGrade($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examOneBioGrade'] = examOneBiologyGrade($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examOnePhysicsGrade'] = examOnePhysicsGrade($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examOneCREGrade'] = examOneCREGrade($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examOneIslamGrade'] = examOneIslamGrade($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examOneHistGrade'] = examOneHistoryGrade($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examOneGHCGrade'] = examOneGHCGrade($yearId,$termId,$classId,$examOneMark,$name,$streamId);

        // Exam Two Subject Grades
        $data['examTwoMathsGrade'] = examTwoMathsGrade($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examTwoEnglishGrade'] = examTwoEnglishGrade($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examTwoKiswGrade'] = examTwoKiswahiliGrade($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examTwoChemGrade'] = examTwoChemistryGrade($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examTwoBioGrade'] = examTwoBiologyGrade($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examTwoPhysicsGrade'] = examTwoPhysicsGrade($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examTwoCREGrade'] = examTwoCREGrade($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examTwoIslamGrade'] = examTwoIslamGrade($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examTwoHistGrade'] = examTwoHistoryGrade($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examTwoGHCGrade'] = examTwoGHCGrade($yearId,$termId,$classId,$examTwoMark,$name,$streamId);

        // Exam Three Subject Grades
        $data['examThreeMathsGrade'] = examThreeMathsGrade($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['examThreeEnglishGrade'] = examThreeEnglishGrade($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['examThreeKiswGrade'] = examThreeKiswahiliGrade($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['examThreeChemGrade'] = examThreeChemistryGrade($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['examThreeBioGrade'] = examThreeBiologyGrade($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['examThreePhysicsGrade'] = examThreePhysicsGrade($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['examThreeCREGrade'] = examThreeCREGrade($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['examThreeIslamGrade'] = examThreeIslamGrade($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['examThreeHistGrade'] = examThreeHistoryGrade($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['examThreeGHCGrade'] = examThreeGHCGrade($yearId,$termId,$classId,$examThreeMark,$name,$streamId);

        //Perform Cumulative Subjects Grade Points
        //Get Maths GPA 
        $data['examOneMathsGradePoints'] = examOneMathsGradePoints($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examTwoMathsGradePoints'] = examTwoMathsGradePoints($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examThreeMathsGradePoints'] = examThreeMathsGradePoints($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['mathsCumulativePoints'] = collect($examOneMathsGradePoints,$examTwoMathsGradePoints,$examThreeMathsGradePoints)->avg();
        //Get English GPA 
        $data['examOneEnglishGradePoints'] = examOneEnglishGradePoints($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examTwoEnglishGradePoints'] = examTwoEnglishGradePoints($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examThreeEnglishGradePoints'] = examThreeEnglishGradePoints($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['englishCumulativePoints'] = collect($examOneEnglishGradePoints,$examTwoEnglishGradePoints,$examThreeEnglishGradePoints)->avg();
        //Get Kiswahili GPA 
        $data['examOneKiswahiliGradePoints'] = examOneKiswahiliGradePoints($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examTwoKiswahiliGradePoints'] = examTwoKiswahiliGradePoints($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examThreeKiswahiliGradePoints'] = examThreeKiswahiliGradePoints($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['kiswCumulativePoints'] = collect($examOneKiswahiliGradePoints,$examTwoKiswahiliGradePoints,$examThreeKiswahiliGradePoints)->avg();
        //Get Chemistry GPA 
        $data['examOneChemGradePoints'] = examOneChemistryGradePoints($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examTwoChemGradePoints'] = examTwoChemistryGradePoints($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examThreeChemGradePoints'] = examThreeChemistryGradePoints($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['chemCumulativePoints'] = collect($examOneChemGradePoints,$examTwoChemGradePoints,$examThreeChemGradePoints)->avg();
        //Get Biology GPA 
        $data['examOneBioGradePoints'] = examOneBiologyGradePoints($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examTwoBioGradePoints'] = examTwoBiologyGradePoints($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examThreeBioGradePoints'] = examThreeBiologyGradePoints($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['bioCumulativePoints'] = collect($examOneBioGradePoints,$examTwoBioGradePoints,$examThreeBioGradePoints)->avg();
        //Get Physics GPA 
        $data['examOnePhysicsGradePoints'] = examOnePhysicsGradePoints($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examTwoPhysicsGradePoints'] = examTwoPhysicsGradePoints($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examThreePhysicsGradePoints'] = examThreePhysicsGradePoints($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['physicsCumulativePoints'] = collect($examOnePhysicsGradePoints,$examTwoPhysicsGradePoints,$examThreePhysicsGradePoints)->avg();
        //Get CRE GPA 
        $data['examOneCREGradePoints'] = examOneCREGradePoints($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examTwoCREGradePoints'] = examTwoCREGradePoints($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examThreeCREGradePoints'] = examThreeCREGradePoints($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['creCumulativePoints'] = collect($examOneCREGradePoints,$examTwoCREGradePoints,$examThreeCREGradePoints)->avg();
        //Get Islam GPA 
        $data['examOneIslamGradePoints'] = examOneIslamGradePoints($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examTwoIslamGradePoints'] = examTwoIslamGradePoints($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examThreeIslamGradePoints'] = examThreeIslamGradePoints($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['islamCumulativePoints'] = collect($examOneIslamGradePoints,$examTwoIslamGradePoints,$examThreeIslamGradePoints)->avg();
        //Get History GPA 
        $data['examOneHistGradePoints'] = examOneHistoryGradePoints($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examTwoHistGradePoints'] = examTwoHistoryGradePoints($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examThreeHistGradePoints'] = examThreeHistoryGradePoints($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['histCumulativePoints'] = collect($examOneHistGradePoints,$examTwoHistGradePoints,$examThreeHistGradePoints)->avg();
        //Get GHC GPA 
        $data['examOneGHCGradePoints'] = examOneGHCGradePoints($yearId,$termId,$classId,$examOneMark,$name,$streamId);
        $data['examTwoGHCGradePoints'] = examTwoGHCGradePoints($yearId,$termId,$classId,$examTwoMark,$name,$streamId);
        $data['examThreeGHCGradePoints'] = examThreeGHCGradePoints($yearId,$termId,$classId,$examThreeMark,$name,$streamId);
        $data['ghcCumulativePoints'] = collect($examOneGHCGradePoints,$examTwoGHCGradePoints,$examThreeGHCGradePoints)->avg();

        return $data;
	}
}