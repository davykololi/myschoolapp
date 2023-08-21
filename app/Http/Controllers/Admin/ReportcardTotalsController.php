<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassTotal;
use App\Models\StreamTotal;
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
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
    }

    public function classTotalsStore(Request $request)
    {
        ClassTotal::query()->truncate();

        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        //Get Exam Ids
        $examIds = Exam::whereIn('id',$request->exams)->get();
        $array = $examIds->toArray();
        $examOneId = $array[0];
        $examTwoId = $array[1];
        $examThreeId = $array[2];

        $class = MyClass::where('id',$classId)->first();
        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();

        if(($yearId === null) || ($termId === null) || ($classId === null) || ($examOneId === null) || ($examTwoId === null) || ($examThreeId === null)){
            return back()->withErrors('Please populate class marks first!');
        }

        $classSt = $class->students;
        $classStudents = $classSt->toArray();

        foreach($classStudents as $student){
            $name = $student['full_name'];
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
            $hist = collect([$examOneMark->history,$examTwoMark->history,$examThreeMark->history]);
            $histAvg = $hist->avg();
            $ghc = collect([$examOneMark->ghc,$examTwoMark->ghc,$examThreeMark->ghc]);
            $ghcAvg = $ghc->avg();

            $examOneTotal = $examOneMark->total;
            $examTwoTotal = $examTwoMark->total;
            $examThreeTotal = $examThreeMark->total;
            $overalTotal = collect([$examOneTotal,$examTwoTotal,$examThreeTotal]);
            $overalTotalAvg = $overalTotal->avg();

                ClassTotal::upsert([
                            'name' => $mark->name,
                            'mark_total' => round($overalTotalAvg,0),
                            'admission_no' => $mark->admission_no,
                ],['admission_no'],['name','mark_total']);
        }

        return back()->withSuccess('You are good to go!');
    }

    public function streamTotalsStore(Request $request)
    {
        StreamTotal::query()->truncate();

        $yearId = $request->year;
        $termId = $request->term;
        $streamId = $request->stream;
        //Get Exam Ids
        $examIds = Exam::whereIn('id',$request->exams)->get();
        $array = $examIds->toArray();
        $examOneId = $array[0];
        $examTwoId = $array[1];
        $examThreeId = $array[2];

        $stream = Stream::where('id',$streamId)->first();
        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();

        if(($yearId === null) || ($termId === null) ||($streamId === null) || ($examOneId === null) || ($examTwoId === null) || ($examThreeId === null)){
            return back()->withErrors('Please populate stream marks first!');
        }

        $classId = $stream->class->id;
        $streamSt = $stream->students;
        $streamStudents = $streamSt->toArray();

        foreach($streamStudents as $student){
            $name = $student['full_name'];
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
            $hist = collect([$examOneMark->history,$examTwoMark->history,$examThreeMark->history]);
            $histAvg = $hist->avg();
            $ghc = collect([$examOneMark->ghc,$examTwoMark->ghc,$examThreeMark->ghc]);
            $ghcAvg = $ghc->avg();

            $examOneTotal = $examOneMark->total;
            $examTwoTotal = $examTwoMark->total;
            $examThreeTotal = $examThreeMark->total;
            $overalTotal = collect([$examOneTotal,$examTwoTotal,$examThreeTotal]);
            $overalTotalAvg = $overalTotal->avg();

                StreamTotal::upsert([
                            'name' => $mark->name,
                            'mark_total' => round($overalTotalAvg,0),
                            'admission_no' => $mark->admission_no,
                ],['admission_no'],['name','mark_total']);
        }

        return back()->withSuccess('Everything Ok!');
    }
}
