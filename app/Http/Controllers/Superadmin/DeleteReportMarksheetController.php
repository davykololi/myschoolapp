<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\MyClass;
use App\Models\Exam;
use App\Models\Mark;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteReportMarksheetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $classId = $request->class;

        $class = MyClass::where('id',$classId)->first();
        $exam = Exam::where('id',$examId)->first();

        $marks = Mark::where(['year_id'=>$yearId,'term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId])->get();
        if($marks->isEmpty()){
            return back()->withErrors('There are no marks');
        }
            $marks = Mark::where(['year_id'=>$yearId,'term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId])->delete();

            return back()->withSuccess(ucwords($class->name." ".$exam->name." ".'results deleted successfully')); 
    }
}
