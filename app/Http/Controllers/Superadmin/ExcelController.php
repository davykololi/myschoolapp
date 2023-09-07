<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\Year;
use App\Models\Term;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Teacher;
use App\Exports\TeachersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
    }

    public function marksheetsForm()
    {
        $years = Year::all();
        $terms = Term::all();
        $classes = MyClass::all();
        $streams = Stream::all();
        $exams = Exam::all();
        $teachers = Teacher::all();

        return view('superadmin.marksheets.marksheet_form',compact('years','terms','classes','streams','exams','teachers'));
    }

    public function exportSchoolTeachers()
    {
        return Excel::download(new TeachersExport(),Auth::user()->school->name." ".'Teachers'.'.xlsx');
    }
}
