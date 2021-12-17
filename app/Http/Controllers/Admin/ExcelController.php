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
use App\Imports\StreamsReportCardsSheetImport;
use App\Models\Stream;
use App\Models\StreamSection;
use App\Exports\TeachersExport;
use App\Exports\StreamStudentsExport;
use App\Exports\StreamTeachersExport;
use App\Exports\ClassMarksExport;
use App\Exports\StreamMarksExport;
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
    	return Excel::download(new StreamStudentsExport($stream),$stream->name." ".'Students'.'.xlsx');
    }

    public function exportStreamTeachers(Stream $stream)
    {
        return Excel::download(new StreamTeachersExport($stream),$stream->name." ".'Teachers'.'.xlsx');
    }

    public function exportSchoolTeachers()
    {
        return Excel::download(new TeachersExport(),Auth::user()->school->name." ".'Teachers'.'.xlsx');
    }

    public function classResultMarks(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $classId = $request->class;
        $marks = Mark::where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get();
        $year = Year::where('id',$yearId)->first();
        $class = MyClass::where('id',$classId)->first();
        $exam = Exam::where('id',$examId)->first();

        return Excel::download(new ClassMarksExport($marks),$year->year." ".$class->name." ".$exam->name." ".'Results.xlsx');
    }

    public function streamResultMarks(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $streamId = $request->stream;
        $year = Year::where('id',$yearId)->first();
        $exam = Exam::where('id',$examId)->first();
        $stream = Stream::where('id',$streamId)->first();
        $marks = Mark::where(['term_id'=>$termId,'exam_id'=>$examId,'stream_id'=>$streamId,'year_id'=>$yearId])->get();

        return Excel::download(new StreamMarksExport($marks),$year->year." ".$stream->name." ".$exam->name." ".'Results.xlsx');
    }

    public function streamsReportCardsImport()
    {
        $years = Year::all();
        $terms = Term::all();
        $classes = MyClass::all();
        $streams = Stream::all();
        $exams = Exam::all();
        $teachers = Teacher::all();

        return view('admin.report_cards.streamsreport_cardsimport',compact('years','terms','classes','streams','exams','teachers'));
    }

    public function streamsReportCardsStore(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        $teacherId = $request->teacher;
        $schoolId = auth()->user()->id;
        $north = StreamSection::whereName('North')->firstOrFail();
        $northId = $north->id;
        $south = StreamSection::whereName('South')->firstOrFail();
        $southId = $south->id;
        $west = StreamSection::whereName('West')->firstOrFail();
        $westId = $west->id;
        $east = StreamSection::whereName('East')->firstOrFail();
        $eastId = $east->id;
        $class = MyClass::whereId($classId)->first();

        \Excel::import(new StreamsReportCardsSheetImport($yearId,$termId,$classId,$teacherId,$northId,$southId,$westId,$eastId,$schoolId),request()->file('file'));

        \Session::put('success', 'The Report Card Sheets For'." ".$class->name." ".'Streams Uploaded Successfully');

        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function marksheetImportForm()
    {
        $years = Year::all();
        $terms = Term::all();
        $classes = MyClass::all();
        $streams = Stream::all();
        $exams = Exam::all();
        $teachers = Teacher::all();

        return view('admin.marksheets.marksheet_import',compact('years','terms','classes','streams','exams','teachers'));
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
        $year = Year::whereId($yearId)->first();
        $term = Term::whereId($termId)->first();
        $class = MyClass::whereId($classId)->first();

        $exam = Exam::whereId($examId)->first();

        \Excel::import(new StreamsMarkSheetImport($yearId,$termId,$examId,$classId,$teacherId,$northId,$southId,$westId,$eastId),request()->file('file'));

        \Session::put('success',$year->year." ".$term->name." ".$class->name." ".$exam->name." ".'Result Marksheets Uploaded Successfully!!');

        return back();
    }
}
