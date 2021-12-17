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
    }

    public function clearClassTotals()
    {
        ClassTotal::query()->truncate();
        
        return back()->withSuccess('The space for class positions is clear,now proceed!!');
    }

    public function clearStreamTotals()
    {
        StreamTotal::query()->truncate();
        
        return back()->withSuccess('The space for stream positions is clear,now proceed!!');
    }

    public function classTotalsStore(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        $examOneId = $request->exam_one;
        $examTwoId = $request->exam_two;
        $examThreeId = $request->exam_three;
        $class = MyClass::where('id',$classId)->first();
        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();

        $classSt = $class->students;
        $classStudents = $classSt->toArray();

        foreach($classStudents as $student){
            $name = $student['name'];
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

                ClassTotal::updateOrCreate([
                            'name' => $name,
                            'mark_total' => $overalTotalAvg,
                            'index_no' => $mark->index_no,
                ]);
        }

        return back()->withSuccess('You are good to go!');
    }

    public function streamTotalsStore(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        $streamId = $request->stream;
        $examOneId = $request->exam_one;
        $examTwoId = $request->exam_two;
        $examThreeId = $request->exam_three;
        $stream = Stream::where(['id'=>$streamId,'class_id'=>$classId])->first();
        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();

        $streamSt = $stream->students;
        $streamStudents = $streamSt->toArray();

        foreach($streamStudents as $student){
            $name = $student['name'];
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
                            'name' => $name,
                            'mark_total' => $overalTotalAvg,
                            'index_no' => $mark->index_no,
                ]);
        }

        return back()->withSuccess('Everything Ok!');
    }
}
