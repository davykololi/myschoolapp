<?php

namespace App\Http\Controllers\Superadmin;

use App\Models\Year;
use App\Models\Term;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Teacher;
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
}
