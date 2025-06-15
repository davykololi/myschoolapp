<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminReportCardExamsController extends Controller
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

    public function twoExamsReportCardSettings(Request $request)
    {
        if(session()->exists("AdminRtExams")){
            session()->forget("AdminRtExams");
        }
        $examIds = $request->exams;
        $examIdsCount = collect($examIds)->count();

        if(is_null($examIds)){
            return back()->withErrors('Ensure you have selected two exams only before you proceed');
        }
        if(($examIdsCount < 2) || ($examIdsCount > 2)){
            return back()->withErrors('Only two exams are allowed at a time');
        }
        // Obtained Exams Ids to array
        $obtainedExamsIds = Exam::whereIn('id',$examIds)->get();
        $examsIdsToArray = $obtainedExamsIds->toArray();

        Session::put('AdminRtExams',$examsIdsToArray);

        return back()->withSuccess('Settings For Two Exams Report Card Done Well!');
    }

    public function threeExamsReportCardSettings(Request $request)
    {
        if(session()->exists("AdminRtExams")){
            session()->forget("AdminRtExams");
        }
        $examIds = $request->exams;
        $examIdsCount = collect($examIds)->count();

        if(is_null($examIds)){
            return back()->withErrors('Ensure you have selected three exams only before you proceed');
        }

        if(($examIdsCount < 3) || ($examIdsCount > 3)){
            return back()->withErrors('Ensure you have selected three exams only before you proceed');
        }
        // Obtained Exams Ids to array
        $obtainedExamsIds = Exam::whereIn('id',$examIds)->get();
        $examsIdsToArray = $obtainedExamsIds->toArray();

        Session::put('AdminRtExams',$examsIdsToArray);

        return back()->withSuccess('Settings For Three Exams Report Card Done Well!');

    }
}
