<?php

namespace App\Http\Controllers\Teacher;

use Session;
use App\Models\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportcardExamsSettingController extends Controller
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

    public function twoExamsReportCardSettings(Request $request)
    {
        if(session()->exists("rtExams")){
            session()->forget("rtExams");
        }
        $examIds = $request->exams;
        $examIdsCount = collect($examIds)->count();

        if(is_null($examIds)){
            return back()->withError('Ensure you have selected two exams only before you proceed');
        }
        if(($examIdsCount < 2) || ($examIdsCount > 2)){
            return back()->withError('Only two exams are allowed at a time');
        }
        // Obtained Exams Ids to array
        $obtainedExamsIds = Exam::whereIn('id',$examIds)->get();
        $examsIdsToArray = $obtainedExamsIds->toArray();

        Session::put('rtExams',$examsIdsToArray);

        return back()->withSuccess('Settings For Two Exams Report Card Done Well!');
    }

    public function threeExamsReportCardSettings(Request $request)
    {
        if(session()->exists("rtExams")){
            session()->forget("rtExams");
        }
        $examIds = $request->exams;
        $examIdsCount = collect($examIds)->count();

        if(is_null($examIds)){
            return back()->withError('Ensure you have selected three exams only before you proceed');
        }

        if(($examIdsCount < 3) || ($examIdsCount > 3)){
            return back()->withError('Ensure you have selected three exams only before you proceed');
        }
        // Obtained Exams Ids to array
        $obtainedExamsIds = Exam::whereIn('id',$examIds)->get();
        $examsIdsToArray = $obtainedExamsIds->toArray();

        Session::put('rtExams',$examsIdsToArray);

        return back()->withSuccess('Settings For Three Exams Report Card Done Well!');

    }
}
