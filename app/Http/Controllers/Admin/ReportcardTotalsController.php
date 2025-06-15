<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Session;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Term;
use App\Models\Year;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportcardTotalsController extends Controller
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

    public function twoExamsClassTotalsStore(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $classId = $request->class_id;

        //Class totals general required requests not done well error
        if((is_null($yearId)) || (is_null($termId)) || (is_null($classId))){
            return back()->withErrors(ucwords('Please ensure you have filled all the required details!'));
        }
        
        //Obtained exams ids to array
        $array = Session::get('AdminRtExams');
        $examOneId = $array[0];
        $examTwoId = $array[1];

        $class = MyClass::where('id',$classId)->first();
        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();

        if(session()->exists("classTotal")){
            session()->forget("classTotal");
        }

        $classStudents = $class->students()->with('user')->get();
        if($classStudents->isNotEmpty()){
            foreach($classStudents as $student){
                $name = $student->user->full_name;
                $mark = Mark::when($yearId,function($query,$yearId){
                        return $query->where('year_id',$yearId);
                    })->when($termId,function($query,$termId){
                        return $query->where('term_id',$termId);
                    })->when($classId,function($query,$classId){
                        return $query->where('class_id',$classId);
                    })->when($name,function($query,$name){
                        return $query->where('name','like',"%$name%");
                    })->firstOrFail();

                $examOneMark = Mark::where(['name'=>$name,'class_id'=>$classId,'exam_id'=>$examOneId])->first();
                $examTwoMark = Mark::where(['name'=>$name,'class_id'=>$classId,'exam_id'=>$examTwoId])->first();

                $maths = collect([$examOneMark->mathematics,$examTwoMark->mathematics]);
                $mathsAvg = $maths->avg();
                $eng = collect([$examOneMark->english,$examTwoMark->english]);
                $engAvg = $eng->avg();
                $kisw = collect([$examOneMark->kiswahili,$examTwoMark->kiswahili]);
                $kiswAvg = $kisw->avg();
                $chem = collect([$examOneMark->chemistry,$examTwoMark->chemistry]);
                $chemAvg = $chem->avg();
                $bio = collect([$examOneMark->biology,$examTwoMark->biology]);
                $bioAvg = $bio->avg();
                $physics = collect([$examOneMark->physics,$examTwoMark->physics]);
                $physicsAvg = $physics->avg();
                $cre = collect([$examOneMark->cre,$examTwoMark->cre]);
                $creAvg = $cre->avg();
                $islam = collect([$examOneMark->islam,$examTwoMark->islam]);
                $islamAvg = $islam->avg();
                $historyAndGoverment = collect([$examOneMark->history_and_government,$examTwoMark->history_and_government]);
                $histAndGovernmentAvg = $historyAndGoverment->avg();
                $geog = collect([$examOneMark->geography,$examTwoMark->geography]);
                $geogAvg = $geog->avg();
                $homeScience = collect([$examOneMark->home_science,$examTwoMark->home_science]);
                $homeScienceAvg = $homeScience->avg();
                $artAndDesign = collect([$examOneMark->art_and_design,$examTwoMark->art_and_design]);
                $artAndDesignAvg = $artAndDesign->avg();
                $agriculture = collect([$examOneMark->agriculture,$examTwoMark->agriculture]);
                $agricultureAvg = $agriculture->avg();
                $businessStudies = collect([$examOneMark->business_studies,$examTwoMark->business_studies]);
                $businessStudiesAvg = $businessStudies->avg();
                $computerStudies = collect([$examOneMark->computer_studies,$examTwoMark->computer_studies]);
                $computerStudiesAvg = $computerStudies->avg();
                $drawingAndDesign = collect([$examOneMark->drawing_and_design,$examTwoMark->drawing_and_design]);
                $drawingAndDesignAvg = $drawingAndDesign->avg();
                $french = collect([$examOneMark->french,$examTwoMark->french]);
                $frenchAvg = $french->avg();
                $german = collect([$examOneMark->german,$examTwoMark->german]);
                $germanAvg = $german->avg();
                $arabic = collect([$examOneMark->arabic,$examTwoMark->arabic]);
                $arabicAvg = $arabic->avg();
                $signLanguage = collect([$examOneMark->sign_language,$examTwoMark->sign_language]);
                $signLanguageAvg = $signLanguage->avg();
                $music = collect([$examOneMark->music,$examTwoMark->music]);
                $musicAvg = $music->avg();
                $woodWork = collect([$examOneMark->wood_work,$examTwoMark->wood_work]);
                $woodWorkAvg = $woodWork->avg();
                $metalWork = collect([$examOneMark->metal_work,$examTwoMark->metal_work]);
                $metalWorkAvg = $metalWork->avg();
                $buildingConstruction = collect([$examOneMark->building_construction,$examTwoMark->building_construction]);
                $buildingConstructionAvg = $buildingConstruction->avg();
                $powerMechanics = collect([$examOneMark->power_mechanics,$examTwoMark->power_mechanics]);
                $powerMechanicsAvg = $powerMechanics->avg();
                $electricity = collect([$examOneMark->electricity,$examTwoMark->electricity]);
                $electricityAvg = $electricity->avg();
                $aviationTechnology = collect([$examOneMark->aviation_technology,$examTwoMark->aviation_technology]);
                $aviationTechnologyAvg = $aviationTechnology->avg();

                $examOneTotal = $examOneMark->total;
                $examTwoTotal = $examTwoMark->total;
                $overalTotal = collect([$examOneTotal,$examTwoTotal]);
                $overalTotalAvg = $overalTotal->avg();

                $data = [
                    'name' => $mark->name,
                    'mark_total' => round($overalTotalAvg,0),
                    'admission_no' => $mark->admission_no,
                ];

                Session::push("classTotal",$data);
            }

            return back()->withSuccess('You are good to go!');
        } else {
            return back()->withErrors($class->name." "."has no students at the moment");
        }
    }

    public function threeExamsClassTotalsStore(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $classId = $request->class_id;

        //Class totals general required requests not done well error
        if((is_null($yearId)) || (is_null($termId)) || (is_null($classId))){
            return back()->withErrors(ucwords('Please ensure you have filled all the required details!'));
        }
        
        //Obtained exams ids to array
        $array = Session::get('AdminRtExams');
        $examOneId = $array[0];
        $examTwoId = $array[1];
        $examThreeId = $array[2];

        $class = MyClass::where('id',$classId)->first();
        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();

        if(session()->exists("classTotal")){
            session()->forget("classTotal");
        }

        $classStudents = $class->students()->with('user')->get();
        if($classStudents->isNotEmpty()){
            foreach($classStudents as $student){
                $name = $student->user->full_name;
                $mark = Mark::when($yearId,function($query,$yearId){
                        return $query->where('year_id',$yearId);
                    })->when($termId,function($query,$termId){
                        return $query->where('term_id',$termId);
                    })->when($classId,function($query,$classId){
                        return $query->where('class_id',$classId);
                    })->when($name,function($query,$name){
                        return $query->where('name','like',"%$name%");
                    })->firstOrFail();

                $examOneMark = Mark::where(['name'=>$name,'class_id'=>$classId,'exam_id'=>$examOneId])->first();
                $examTwoMark = Mark::where(['name'=>$name,'class_id'=>$classId,'exam_id'=>$examTwoId])->first();
                $examThreeMark = Mark::where(['name'=>$name,'class_id'=>$classId,'exam_id'=>$examThreeId])->first();

                $maths = collect([$examOneMark->mathematics,$examTwoMark->mathematics,$examThreeMark->mathematics]);
                $mathsAvg = $maths->avg();
                $eng = collect([$examOneMark->english,$examTwoMark->english,$examThreeMark->english]);
                $engAvg = $eng->avg();
                $kisw = collect([$examOneMark->kiswahili,$examTwoMark->kiswahili,$examThreeMark->kiswahili]);
                $kiswAvg = $kisw->avg();
                $chem = collect([$examOneMark->chemistry,$examTwoMark->chemistry,$examThreeMark->chemistry]);
                $chemAvg = $chem->avg();
                $bio = collect([$examOneMark->biology,$examTwoMark->biology,$examThreeMark->biology]);
                $bioAvg = $bio->avg();
                $physics = collect([$examOneMark->physics,$examTwoMark->physics,$examThreeMark->physics]);
                $physicsAvg = $physics->avg();
                $cre = collect([$examOneMark->cre,$examTwoMark->cre,$examThreeMark->cre]);
                $creAvg = $cre->avg();
                $islam = collect([$examOneMark->islam,$examTwoMark->islam,$examThreeMark->islam]);
                $islamAvg = $islam->avg();
                $historyAndGoverment = collect([$examOneMark->history_and_government,$examTwoMark->history_and_government,$examThreeMark->history_and_government]);
                $histAndGovernmentAvg = $historyAndGoverment->avg();
                $geog = collect([$examOneMark->geography,$examTwoMark->geography,$examThreeMark->geography]);
                $geogAvg = $geog->avg();
                $homeScience = collect([$examOneMark->home_science,$examTwoMark->home_science,$examThreeMark->home_science]);
                $homeScienceAvg = $homeScience->avg();
                $artAndDesign = collect([$examOneMark->art_and_design,$examTwoMark->art_and_design,$examThreeMark->art_and_design]);
                $artAndDesignAvg = $artAndDesign->avg();
                $agriculture = collect([$examOneMark->agriculture,$examTwoMark->agriculture,$examThreeMark->agriculture]);
                $agricultureAvg = $agriculture->avg();
                $businessStudies = collect([$examOneMark->business_studies,$examTwoMark->business_studies,$examThreeMark->business_studies]);
                $businessStudiesAvg = $businessStudies->avg();
                $computerStudies = collect([$examOneMark->computer_studies,$examTwoMark->computer_studies,$examThreeMark->computer_studies]);
                $computerStudiesAvg = $computerStudies->avg();
                $drawingAndDesign = collect([$examOneMark->drawing_and_design,$examTwoMark->drawing_and_design,$examThreeMark->drawing_and_design]);
                $drawingAndDesignAvg = $drawingAndDesign->avg();
                $french = collect([$examOneMark->french,$examTwoMark->french,$examThreeMark->french]);
                $frenchAvg = $french->avg();
                $german = collect([$examOneMark->german,$examTwoMark->german,$examThreeMark->german]);
                $germanAvg = $german->avg();
                $arabic = collect([$examOneMark->arabic,$examTwoMark->arabic,$examThreeMark->arabic]);
                $arabicAvg = $arabic->avg();
                $signLanguage = collect([$examOneMark->sign_language,$examTwoMark->sign_language,$examThreeMark->sign_language]);
                $signLanguageAvg = $signLanguage->avg();
                $music = collect([$examOneMark->music,$examTwoMark->music,$examThreeMark->music]);
                $musicAvg = $music->avg();
                $woodWork = collect([$examOneMark->wood_work,$examTwoMark->wood_work,$examThreeMark->wood_work]);
                $woodWorkAvg = $woodWork->avg();
                $metalWork = collect([$examOneMark->metal_work,$examTwoMark->metal_work,$examThreeMark->metal_work]);
                $metalWorkAvg = $metalWork->avg();
                $buildingConstruction = collect([$examOneMark->building_construction,$examTwoMark->building_construction,$examThreeMark->building_construction]);
                $buildingConstructionAvg = $buildingConstruction->avg();
                $powerMechanics = collect([$examOneMark->power_mechanics,$examTwoMark->power_mechanics,$examThreeMark->power_mechanics]);
                $powerMechanicsAvg = $powerMechanics->avg();
                $electricity = collect([$examOneMark->electricity,$examTwoMark->electricity,$examThreeMark->electricity]);
                $electricityAvg = $electricity->avg();
                $aviationTechnology = collect([$examOneMark->aviation_technology,$examTwoMark->aviation_technology,$examThreeMark->aviation_technology]);
                $aviationTechnologyAvg = $aviationTechnology->avg();

                $examOneTotal = $examOneMark->total;
                $examTwoTotal = $examTwoMark->total;
                $examThreeTotal = $examThreeMark->total;
                $overalTotal = collect([$examOneTotal,$examTwoTotal,$examThreeTotal]);
                $overalTotalAvg = $overalTotal->avg();

                $data = [
                    'name' => $mark->name,
                    'mark_total' => round($overalTotalAvg,0),
                    'admission_no' => $mark->admission_no,
                ];

                Session::push("classTotal",$data);
            }

            return back()->withSuccess('You are good to go!');
        } else {
            return back()->withErrors($class->name." "."has no students at he moment!");
        }
    }

    public function twoExamsStreamTotalsStore(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $streamId = $request->stream_id;

        //Stream totals general required requests not done well error
        if(($yearId === null) || ($termId === null) ||($streamId === null)){
            return back()->withErrors('Please fill in all the required details first before you proceed!');
        }
        
        // Obtained Exams ids to array
        $array = Session::get('AdminRtExams');
        $examOneId = $array[0];
        $examTwoId = $array[1];

        $stream = Stream::where('id',$streamId)->first();
        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();

        $classId = $stream->class->id;

        if(session()->exists("streamTotal")){
            session()->forget("streamTotal");
        }

        $streamStudents = $stream->students()->with('user')->get();
        if($streamStudents->isNotEmpty()){
            foreach($streamStudents as $student){
                $name = $student->user->full_name;
                $mark = Mark::when($yearId,function($query,$yearId){
                        return $query->where('year_id',$yearId);
                    })->when($termId,function($query,$termId){
                        return $query->where('term_id',$termId);
                    })->when($classId,function($query,$classId){
                        return $query->where('class_id',$classId);
                    })->when($streamId,function($query,$streamId){
                        return $query->where('stream_id',$streamId);
                    })->when($name,function($query,$name){
                        return $query->where('name','like',"%$name%");
                    })->firstOrFail();

                $examOneMark = Mark::where(['name'=>$name,'class_id'=>$classId,'stream_id'=>$streamId,'exam_id'=>$examOneId])->first();
                $examTwoMark = Mark::where(['name'=>$name,'class_id'=>$classId,'stream_id'=>$streamId,'exam_id'=>$examTwoId])->first();

                $maths = collect([$examOneMark->mathematics,$examTwoMark->mathematics]);
                $mathsAvg = $maths->avg();
                $eng = collect([$examOneMark->english,$examTwoMark->english]);
                $engAvg = $eng->avg();
                $kisw = collect([$examOneMark->kiswahili,$examTwoMark->kiswahili]);
                $kiswAvg = $kisw->avg();
                $chem = collect([$examOneMark->chemistry,$examTwoMark->chemistry]);
                $chemAvg = $chem->avg();
                $bio = collect([$examOneMark->biology,$examTwoMark->biology]);
                $bioAvg = $bio->avg();
                $physics = collect([$examOneMark->physics,$examTwoMark->physics]);
                $physicsAvg = $physics->avg();
                $cre = collect([$examOneMark->cre,$examTwoMark->cre]);
                $creAvg = $cre->avg();
                $islam = collect([$examOneMark->islam,$examTwoMark->islam]);
                $islamAvg = $islam->avg();
                $historyAndGoverment = collect([$examOneMark->history_and_government,$examTwoMark->history_and_government]);
                $histAndGovernmentAvg = $historyAndGoverment->avg();
                $geog = collect([$examOneMark->geography,$examTwoMark->geography]);
                $geogAvg = $geog->avg();
                $homeScience = collect([$examOneMark->home_science,$examTwoMark->home_science]);
                $homeScienceAvg = $homeScience->avg();
                $artAndDesign = collect([$examOneMark->art_and_design,$examTwoMark->art_and_design]);
                $artAndDesignAvg = $artAndDesign->avg();
                $agriculture = collect([$examOneMark->agriculture,$examTwoMark->agriculture]);
                $agricultureAvg = $agriculture->avg();
                $businessStudies = collect([$examOneMark->business_studies,$examTwoMark->business_studies]);
                $businessStudiesAvg = $businessStudies->avg();
                $computerStudies = collect([$examOneMark->computer_studies,$examTwoMark->computer_studies]);
                $computerStudiesAvg = $computerStudies->avg();
                $drawingAndDesign = collect([$examOneMark->drawing_and_design,$examTwoMark->drawing_and_design]);
                $drawingAndDesignAvg = $drawingAndDesign->avg();
                $french = collect([$examOneMark->french,$examTwoMark->french]);
                $frenchAvg = $french->avg();
                $german = collect([$examOneMark->german,$examTwoMark->german]);
                $germanAvg = $german->avg();
                $arabic = collect([$examOneMark->arabic,$examTwoMark->arabic]);
                $arabicAvg = $arabic->avg();
                $signLanguage = collect([$examOneMark->sign_language,$examTwoMark->sign_language]);
                $signLanguageAvg = $signLanguage->avg();
                $music = collect([$examOneMark->music,$examTwoMark->music]);
                $musicAvg = $music->avg();
                $woodWork = collect([$examOneMark->wood_work,$examTwoMark->wood_work]);
                $woodWorkAvg = $woodWork->avg();
                $metalWork = collect([$examOneMark->metal_work,$examTwoMark->metal_work]);
                $metalWorkAvg = $metalWork->avg();
                $buildingConstruction = collect([$examOneMark->building_construction,$examTwoMark->building_construction]);
                $buildingConstructionAvg = $buildingConstruction->avg();
                $powerMechanics = collect([$examOneMark->power_mechanics,$examTwoMark->power_mechanics]);
                $powerMechanicsAvg = $powerMechanics->avg();
                $electricity = collect([$examOneMark->electricity,$examTwoMark->electricity]);
                $electricityAvg = $electricity->avg();
                $aviationTechnology = collect([$examOneMark->aviation_technology,$examTwoMark->aviation_technology]);
                $aviationTechnologyAvg = $aviationTechnology->avg();

                $examOneTotal = $examOneMark->total;
                $examTwoTotal = $examTwoMark->total;
                $overalTotal = collect([$examOneTotal,$examTwoTotal]);
                $overalTotalAvg = $overalTotal->avg();

                $data = [
                    'name' => $mark->name,
                    'mark_total' => round($overalTotalAvg,0),
                    'admission_no' => $mark->admission_no,
                ];

                Session::push("streamTotal",$data);
            }

            return back()->withSuccess('Everything Ok!');
        } else {
            return back()->withErrors($stream->name." "."has no students at the moment");
        }
    }

    public function threeExamsStreamTotalsStore(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $streamId = $request->stream_id;

        //Stream totals general required requests not done well error
        if(($yearId === null) || ($termId === null) ||($streamId === null)){
            return back()->withErrors('Please fill in all the required details first before you proceed!');
        }

        //Obtained Exams ids to array
        $array = Session::get('AdminRtExams');
        $examOneId = $array[0];
        $examTwoId = $array[1];
        $examThreeId = $array[2];

        $stream = Stream::where('id',$streamId)->first();
        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();

        $classId = $stream->class->id;
        $streamStudents = $stream->students()->with('user')->get();

        if(session()->exists("streamTotal")){
            session()->forget("streamTotal");
        }

        if($streamStudents->isNotEmpty()){
            foreach($streamStudents as $i => $student){
                $name = $student->user->full_name;
                $mark = Mark::when($yearId,function($query,$yearId){
                        return $query->where('year_id',$yearId);
                    })->when($termId,function($query,$termId){
                        return $query->where('term_id',$termId);
                    })->when($classId,function($query,$classId){
                        return $query->where('class_id',$classId);
                    })->when($streamId,function($query,$streamId){
                        return $query->where('stream_id',$streamId);
                    })->when($name,function($query,$name){
                        return $query->where('name','like',"%$name%");
                    })->firstOrFail();

                $examOneMark = Mark::where(['name'=>$name,'class_id'=>$classId,'stream_id'=>$streamId,'exam_id'=>$examOneId])->first();
                $examTwoMark = Mark::where(['name'=>$name,'class_id'=>$classId,'stream_id'=>$streamId,'exam_id'=>$examTwoId])->first();
                $examThreeMark = Mark::where(['name'=>$name,'class_id'=>$classId,'stream_id'=>$streamId,'exam_id'=>$examThreeId])->first();

                $maths = collect([$examOneMark->mathematics,$examTwoMark->mathematics,$examThreeMark->mathematics]);
                $mathsAvg = $maths->avg();
                $eng = collect([$examOneMark->english,$examTwoMark->english,$examThreeMark->english]);
                $engAvg = $eng->avg();
                $kisw = collect([$examOneMark->kiswahili,$examTwoMark->kiswahili,$examThreeMark->kiswahili]);
                $kiswAvg = $kisw->avg();
                $chem = collect([$examOneMark->chemistry,$examTwoMark->chemistry,$examThreeMark->chemistry]);
                $chemAvg = $chem->avg();
                $bio = collect([$examOneMark->biology,$examTwoMark->biology,$examThreeMark->biology]);
                $bioAvg = $bio->avg();
                $physics = collect([$examOneMark->physics,$examTwoMark->physics,$examThreeMark->physics]);
                $physicsAvg = $physics->avg();
                $cre = collect([$examOneMark->cre,$examTwoMark->cre,$examThreeMark->cre]);
                $creAvg = $cre->avg();
                $islam = collect([$examOneMark->islam,$examTwoMark->islam,$examThreeMark->islam]);
                $islamAvg = $islam->avg();
                $historyAndGoverment = collect([$examOneMark->history_and_government,$examTwoMark->history_and_government,$examThreeMark->history_and_government]);
                $histAndGovernmentAvg = $historyAndGoverment->avg();
                $geog = collect([$examOneMark->geography,$examTwoMark->geography,$examThreeMark->geography]);
                $geogAvg = $geog->avg();
                $homeScience = collect([$examOneMark->home_science,$examTwoMark->home_science,$examThreeMark->home_science]);
                $homeScienceAvg = $homeScience->avg();
                $artAndDesign = collect([$examOneMark->art_and_design,$examTwoMark->art_and_design,$examThreeMark->art_and_design]);
                $artAndDesignAvg = $artAndDesign->avg();
                $agriculture = collect([$examOneMark->agriculture,$examTwoMark->agriculture,$examThreeMark->agriculture]);
                $agricultureAvg = $agriculture->avg();
                $businessStudies = collect([$examOneMark->business_studies,$examTwoMark->business_studies,$examThreeMark->business_studies]);
                $businessStudiesAvg = $businessStudies->avg();
                $computerStudies = collect([$examOneMark->computer_studies,$examTwoMark->computer_studies,$examThreeMark->computer_studies]);
                $computerStudiesAvg = $computerStudies->avg();
                $drawingAndDesign = collect([$examOneMark->drawing_and_design,$examTwoMark->drawing_and_design,$examThreeMark->drawing_and_design]);
                $drawingAndDesignAvg = $drawingAndDesign->avg();
                $french = collect([$examOneMark->french,$examTwoMark->french,$examThreeMark->french]);
                $frenchAvg = $french->avg();
                $german = collect([$examOneMark->german,$examTwoMark->german,$examThreeMark->german]);
                $germanAvg = $german->avg();
                $arabic = collect([$examOneMark->arabic,$examTwoMark->arabic,$examThreeMark->arabic]);
                $arabicAvg = $arabic->avg();
                $signLanguage = collect([$examOneMark->sign_language,$examTwoMark->sign_language,$examThreeMark->sign_language]);
                $signLanguageAvg = $signLanguage->avg();
                $music = collect([$examOneMark->music,$examTwoMark->music,$examThreeMark->music]);
                $musicAvg = $music->avg();
                $woodWork = collect([$examOneMark->wood_work,$examTwoMark->wood_work,$examThreeMark->wood_work]);
                $woodWorkAvg = $woodWork->avg();
                $metalWork = collect([$examOneMark->metal_work,$examTwoMark->metal_work,$examThreeMark->metal_work]);
                $metalWorkAvg = $metalWork->avg();
                $buildingConstruction = collect([$examOneMark->building_construction,$examTwoMark->building_construction,$examThreeMark->building_construction]);
                $buildingConstructionAvg = $buildingConstruction->avg();
                $powerMechanics = collect([$examOneMark->power_mechanics,$examTwoMark->power_mechanics,$examThreeMark->power_mechanics]);
                $powerMechanicsAvg = $powerMechanics->avg();
                $electricity = collect([$examOneMark->electricity,$examTwoMark->electricity,$examThreeMark->electricity]);
                $electricityAvg = $electricity->avg();
                $aviationTechnology = collect([$examOneMark->aviation_technology,$examTwoMark->aviation_technology,$examThreeMark->aviation_technology]);
                $aviationTechnologyAvg = $aviationTechnology->avg();

                $examOneTotal = $examOneMark->total;
                $examTwoTotal = $examTwoMark->total;
                $examThreeTotal = $examThreeMark->total;
                $overalTotal = collect([$examOneTotal,$examTwoTotal,$examThreeTotal]);
                $overalTotalAvg = $overalTotal->avg();

                $data = [
                    'name' => $mark->name,
                    'mark_total' => round($overalTotalAvg,0),
                    'admission_no' => $mark->admission_no,
                ];

                Session::push("streamTotal",$data);
            }

            return back()->withSuccess('Everything Ok!');
        } else {
            return back()->withErrors($stream->name." "."has no students at the moment!");
        }
    }
}
