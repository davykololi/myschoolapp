<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mark;
use App\Models\MyClass;
use App\Models\Exam;
use App\Models\Teacher;
use App\Models\Term;
use App\Models\Year;
use App\Imports\ClassMarkSheetImport;
use App\Imports\StreamsMarkSheetImport;
use App\Models\Stream;
use App\Models\StreamSection;
use App\Exports\TeachersExport;
use App\Exports\StreamStudentsExport;
use App\Exports\StreamTeachersExport;
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
        $this->middleware('auth:admin');
    }

    public function exportStreamStudents(Stream $stream)
    {
    	return Excel::download(new StreamStudentsExport($stream),'stream_students.xlsx');
    }

    public function exportStreamTeachers(Stream $stream)
    {
        return Excel::download(new StreamTeachersExport($stream),'stream_teachers.xlsx');
    }

    public function exportSchoolTeachers()
    {
        return Excel::download(new TeachersExport(),'school_teachers.xlsx');
    }

    public function classReportsImport()
    {
        return view('admin.reports_excel.class_reports_import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function classMarkSheetImportForm()
    {
        $years = Year::all();
        $terms = Term::all();
        $classes = MyClass::all();
        $streams = Stream::all();
        $exams = Exam::all();
        $teachers = Teacher::all();

        return view('admin.marksheets.marksheet_import',compact('years','terms','classes','streams','exams','teachers'));
    }

    public function classMarkSheetImportStore(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        $examId = $request->exam;
        $teacherId = $request->teacher;
        \Excel::import(new ClassMarkSheetImport($yearId,$termId,$classId,$examId,$teacherId),request()->file('file'));

        \Session::put('success', 'The marksheet saved successfully.');

        return back();
    }

    public function streamsMarksheets(Request $request)
    {
    	$yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $classId = $request->class;
        $teacherId = $request->teacher;
        $north = StreamSection::whereName('North')->firstOrFail();
        $northId = $north->id;
        $south = StreamSection::whereName('South')->firstOrFail();
        $southId = $south->id;
        $west = StreamSection::whereName('West')->firstOrFail();
        $westId = $west->id;
        $east = StreamSection::whereName('East')->firstOrFail();
        $eastId = $east->id;
        $class = MyClass::whereId($classId)->first();
        $exam = Exam::whereId($examId)->first();

        \Excel::import(new StreamsMarkSheetImport($yearId,$termId,$examId,$classId,$teacherId,$northId,$southId,$westId,$eastId),request()->file('file'));

        \Session::put('success', $class->name." ".$exam->name." ".'result marksheets uploaded successfully!!');

        return back();
    }
}
