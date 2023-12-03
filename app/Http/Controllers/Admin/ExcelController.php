<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Mark;
use App\Models\Grade;
use App\Models\Year;
use App\Models\Term;
use App\Models\MyClass;
use App\Models\Stream;
use App\Models\Exam;
use App\Models\StreamSection;
use App\Models\Subject;
use App\Services\YearService;
use App\Services\TermService;
use App\Services\ExamService;
use App\Services\ClassService;
use App\Services\StreamService;
use App\Services\TeacherService;
use App\Services\SubjectService;
use App\Imports\ClassMarkSheets\StreamsMarkSheetImport;
use App\Imports\ReportCardGeneralRemarks\ReportcardRemarksSheetImport;
use App\Exports\StreamStudentsExport;
use App\Exports\StreamTeachersExport;
use App\Exports\ClassMarksExport;
use App\Exports\StreamMarksExport;
use App\Imports\SubjectGrades\MarksGradesheetImport;
use App\Imports\GeneralGradesheetImport;
use App\Imports\ReportCardSubjectGrades\ReportSubjectGradesheetImport;
use App\Imports\ReportCardMeanGrades\ReportMeanGradesheetImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    protected $yearService, $termService, $examService, $classService, $streamService, $teacherService, $subjectService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( YearService $yearService, TermService $termService, ExamService $examService, ClassService $classService, StreamService $streamService, TeacherService $teacherService, SubjectService $subjectService)
    {
        $this->middleware('auth:admin');
        $this->middleware('banned');
        $this->middleware('admin2fa');
        $this->yearService = $yearService;
        $this->termService = $termService;
        $this->examService = $examService;
        $this->classService = $classService;
        $this->streamService = $streamService;
        $this->teacherService = $teacherService;
        $this->subjectService = $subjectService;

    }

    public function exportStreamStudents(Stream $stream)
    {
        return Excel::download(new StreamStudentsExport($stream),$stream->name." ".'Students'.'.xlsx');
    }

    public function exportStreamTeachers(Stream $stream)
    {
        return Excel::download(new StreamTeachersExport($stream),$stream->name." ".'Teachers'.'.xlsx');
    }

    public function classResultMarks(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $classId = $request->class;

        if((is_null($yearId)) || (is_null($termId)) || (is_null($examId)) || (is_null($streamId))){
            return back()->withErrors('Please fill in all the required details before you proceed!');
        }

        $marks = Mark::where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get();
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $class = MyClass::where('id',$classId)->first();
        $exam = Exam::where(['id'=>$examId,'year_id'=>$yearId,'term_id'=>$termId])->first();

        if(($yearId === !$exam->year->id) || ($termId === !$exam->term->id) || (empty($marks))){
            return back()->withErrors('Ensure that the exam corresponds with the year and term it was taken!');
        } 

        return Excel::download(new ClassMarksExport($marks),$year->year." ".$class->name." ".$exam->name." ".'Results.xlsx');
    }

    public function streamResultMarks(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $streamId = $request->stream;

        if((is_null($yearId)) || (is_null($termId)) || (is_null($examId)) || (is_null($streamId))){
            return back()->withErrors('Please fill in all the required details before you proceed!');
        } 

        $year = Year::where('id',$yearId)->first();
        $exam = Exam::where(['id'=>$examId,'year_id'=>$yearId,'term_id'=>$termId])->first();
        $stream = Stream::where('id',$streamId)->first();
        $marks = Mark::where(['term_id'=>$termId,'exam_id'=>$examId,'stream_id'=>$streamId,'year_id'=>$yearId])->get();

        return Excel::download(new StreamMarksExport($marks),$year->year." ".$stream->name." ".$exam->name." ".'Results.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function marksheetImportForm()
    {
        $years = $this->yearService->all();
        $terms = $this->termService->all();
        $classes = $this->classService->all();
        $streams = $this->streamService->all();
        $exams = $this->examService->all();
        $teachers = $this->teacherService->all();
        $subjects = $this->subjectService->all();

        return view('admin.marksheets.marksheet_import',compact('years','terms','classes','streams','exams','teachers','subjects'));
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
        $requestedFile = request()->file('file');

        if(($yearId === null) || ($termId === null) || ($examId === null) || ($classId === null) || ($teacherId === null) || ($northId === null) || ($southId === null) || ($westId === null) || ($eastId === null) || (empty($requestedFile))){
            return back()->withErrors('Please fill in the required details before you proceed!');
        } 

        \Excel::import(new StreamsMarkSheetImport($yearId,$termId,$examId,$classId,$teacherId,$northId,$southId,$westId,$eastId),$requestedFile);

        \Session::put('success',$term->name." ".$class->name." ".$exam->name." ".'Result Marksheets Uploaded Successfully!!');

        return back();
    }

    public function marksGradesStore(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        $examId = $request->exam;
        $teacherId = $request->teacher;

        $maths = Subject::whereName('Mathematics')->firstOrFail();
        $mathsId = $maths->id;
        $english = Subject::whereName('English')->firstOrFail();
        $englishId = $english->id;
        $kisw = Subject::whereName('Kiswahili')->firstOrFail();
        $kiswId = $kisw->id;
        $chem = Subject::whereName('Chemistry')->firstOrFail();
        $chemId = $chem->id;
        $biology = Subject::whereName('Biology')->firstOrFail();
        $bioId = $biology->id;
        $physics = Subject::whereName('Physics')->firstOrFail();
        $physicsId = $physics->id;
        $cre = Subject::whereName('CRE')->firstOrFail();
        $creId = $cre->id;
        $islam = Subject::whereName('Islam')->firstOrFail();
        $islamId = $islam->id;
        $hist = Subject::whereName('History')->firstOrFail();
        $histId = $hist->id;
        $geog = Subject::whereName('Geography')->firstOrFail();
        $geogId = $geog->id;
        
        
        $class = MyClass::whereId($classId)->first();
        $year = Year::whereId($yearId)->first();
        $term = Term::whereId($termId)->first();
        $exam = Exam::where(['id'=>$examId,'term_id'=>$termId,'year_id'=>$yearId])->first();
        $requestedFile = request()->file('file');

        if(($yearId === null) || ($termId === null) || ($examId === null) || ($classId === null) || ($exam === null) || (empty($requestedFile))){
            return back()->withErrors('Please fill in the required details before you proceed!');
        } 

        \Excel::import(new MarksGradesheetImport($yearId,$termId,$classId,$exam,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$geogId),$requestedFile);

        \Session::put('success', $term->name." ".$class->name." ".$exam->name." ".'Grades Uploaded Successfully');

        return back();
    }

    public function generalGradesStore(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        $examId = $request->exam;
        
        $class = MyClass::where('id',$classId)->first();
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where(['id'=>$examId,'term_id'=>$termId,'year_id'=>$yearId])->first();

        if(($yearId === null) || ($termId === null) || ($examId === null) || ($classId === null) || ($exam->year->id =! $yearId) || ($exam->term->id =! $termId)){
            return back()->withErrors('Please fill in the required details before you proceed!');
        } 

        \Excel::import(new GeneralGradesheetImport($yearId,$termId,$classId,$exam),request()->file('file'));

        \Session::put('success', $year->year." ".$term->name." ".$class->name." ".$exam->name." ".'General Grades Uploaded Successfully');

        return back();
    }

    public function reportGeneralRemarks(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        
        $class = MyClass::where('id',$classId)->first();
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();

        if(($yearId === null) || ($termId === null) || ($classId === null)){
            toastr()->error(ucwords('Please ensure you have filled all the required details!'));
            return back();
        } 

        \Excel::import(new ReportcardRemarksSheetImport($yearId,$termId,$classId),request()->file('file'));

        toastr()->success(ucwords($year->year." ".$term->name." ".$class->name." ".'Report Card General Comments Uploaded Successfully'));

        return back();
    }

    public function reportSubjectGradesStore(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        $teacherId = $request->teacher;

        $maths = Subject::whereName('Mathematics')->firstOrFail();
        $mathsId = $maths->id;
        $english = Subject::whereName('English')->firstOrFail();
        $englishId = $english->id;
        $kisw = Subject::whereName('Kiswahili')->firstOrFail();
        $kiswId = $kisw->id;
        $chem = Subject::whereName('Chemistry')->firstOrFail();
        $chemId = $chem->id;
        $biology = Subject::whereName('Biology')->firstOrFail();
        $bioId = $biology->id;
        $physics = Subject::whereName('Physics')->firstOrFail();
        $physicsId = $physics->id;
        $cre = Subject::whereName('CRE')->firstOrFail();
        $creId = $cre->id;
        $islam = Subject::whereName('Islam')->firstOrFail();
        $islamId = $islam->id;
        $hist = Subject::whereName('History')->firstOrFail();
        $histId = $hist->id;
        $geog = Subject::whereName('Geography')->firstOrFail();
        $geogId = $geog->id;
        
        
        $class = MyClass::whereId($classId)->first();
        $year = Year::whereId($yearId)->first();
        $term = Term::whereId($termId)->first();
        $requestedFile = request()->file('file');

        if(($yearId === null) || ($termId === null) || ($classId === null) || (empty($requestedFile))){
            toastr()->error(ucwords('Please ensure you have filled all the required details!'));
            return back();
        } 

        \Excel::import(new ReportSubjectGradesheetImport($yearId,$termId,$classId,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histId,$geogId),$requestedFile);

        \Session::put('success', $term->name." ".$class->name." ".'Report Card Subject Average Grades Uploaded Successfully');

        return back();
    }

    public function reportMeanGradesStore(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        
        $class = MyClass::where('id',$classId)->first();
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();

        if(($yearId === null) || ($termId === null) || ($classId === null)){
            toastr()->error(ucwords('Please ensure you have filled all the required details!'));
            return back();
        } 

        \Excel::import(new ReportMeanGradesheetImport($yearId,$termId,$classId),request()->file('file'));

        \Session::put('success', $year->year." ".$term->name." ".$class->name." ".'Report Card General Grades Uploaded Successfully');

        return back();
    }
}
