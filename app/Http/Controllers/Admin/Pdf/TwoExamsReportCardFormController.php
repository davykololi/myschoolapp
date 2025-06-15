<?php

namespace App\Http\Controllers\Admin\Pdf;

use App\Models\Year;
use App\Models\Term;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\Teacher;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwoExamsReportCardFormController extends Controller
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

    public function twoExamsReportCardForm()
    {
        $years = Year::all();
        $terms = Term::all();
        $classes = MyClass::all();
        $streams = Stream::all();
        $exams = Exam::all();
        $reportExams = Exam::with('school','year','term')->get();
        $teachers = Teacher::with('user')->get();
        $students = Student::with('school','libraries','teachers','stream','clubs','user')->get();

        return view('admin.pdf.twoexams_reportcardform',compact('years','terms','classes','streams','exams','students','teachers','reportExams'));
    }
}
