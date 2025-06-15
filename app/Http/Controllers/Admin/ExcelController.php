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
use App\Enums\StreamsEnum;
use App\Enums\SubjectsEnum;
use App\Imports\ClassMarkSheets\StreamsMarkSheetImport;
use App\Imports\ReportCardGeneralRemarks\ReportcardRemarksSheetImport;
use App\Exports\StreamStudentsExport;
use App\Exports\StreamTeachersExport;
use App\Exports\ClassMarksExport;
use App\Exports\StreamMarksExport;
use App\Imports\SubjectGrades\MarksGradesheetImport;
use App\Imports\ExamGeneralGrades\GeneralGradesheetImport;
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
    public function __construct(YearService $yearService, TermService $termService, ExamService $examService, ClassService $classService, StreamService $streamService, TeacherService $teacherService, SubjectService $subjectService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
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
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $examId = $request->exam_id;
        $classId = $request->class_id;

        if((is_null($yearId)) || (is_null($termId)) || (is_null($examId)) || (is_null($classId))){
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
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $examId = $request->exam_id;
        $streamId = $request->stream_id;

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
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $examId = $request->exam_id;
        $classId = $request->class_id;
        $teacherId = $request->teacher_id;

        if(($yearId === null) || ($termId === null) || ($examId === null) || ($classId === null) || ($teacherId === null)){
            return back()->withErrors('Please fill in the required details before you proceed!');
        }
        
        $north = StreamSection::whereName(StreamsEnum::NORTH->value)->firstOrFail();
        $northId = $north->id;
        $south = StreamSection::whereName(StreamsEnum::SOUTH->value)->firstOrFail();
        $southId = $south->id;
        $west = StreamSection::whereName(StreamsEnum::WEST->value)->firstOrFail();
        $westId = $west->id;
        $east = StreamSection::whereName(StreamsEnum::EAST->value)->firstOrFail();
        $eastId = $east->id;
        $year = Year::whereId($yearId)->first();
        $term = Term::whereId($termId)->first();
        $class = MyClass::whereId($classId)->first();
        $exam = Exam::whereId($examId)->first();

        $requestedFile = request()->file('file');
        if(empty($requestedFile)){
            toastr()->error(ucwords('Please ensure you select the required excel sheet document before you proceed!'));
            return back()->withErrors('Please ensure you select the required excel sheet document before you proceed!');
        }  

        \Excel::import(new StreamsMarkSheetImport($yearId,$termId,$examId,$classId,$teacherId,$northId,$southId,$westId,$eastId),$requestedFile);

        \Session::flash('success',$term->name." ".$class->name." ".$exam->name." ".'Result Marksheets Uploaded Successfully!!');

        return back();
    }

    public function marksGradesStore(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $classId = $request->class_id;
        $examId = $request->exam_id;
        $teacherId = $request->teacher_id;

        $maths = Subject::whereName(SubjectsEnum::MATHS->value)->firstOrFail();
        $mathsId = $maths->id;
        $english = Subject::whereName(SubjectsEnum::ENG->value)->firstOrFail();
        $englishId = $english->id;
        $kisw = Subject::whereName(SubjectsEnum::KISW->value)->firstOrFail();
        $kiswId = $kisw->id;
        $chem = Subject::whereName(SubjectsEnum::CHEM->value)->firstOrFail();
        $chemId = $chem->id;
        $biology = Subject::whereName(SubjectsEnum::BIO->value)->firstOrFail();
        $bioId = $biology->id;
        $physics = Subject::whereName(SubjectsEnum::PHY->value)->firstOrFail();
        $physicsId = $physics->id;
        $cre = Subject::whereName(SubjectsEnum::CRE->value)->firstOrFail();
        $creId = $cre->id;
        $islam = Subject::whereName(SubjectsEnum::ISLM->value)->firstOrFail();
        $islamId = $islam->id;
        $histAndGov = Subject::whereName(SubjectsEnum::HISTANDGOV->value)->firstOrFail();
        $histAndGovId = $histAndGov->id;
        $geog = Subject::whereName(SubjectsEnum::GEOG->value)->firstOrFail();
        $geogId = $geog->id;
        $homeScience = Subject::whereName(SubjectsEnum::HOMESC->value)->firstOrFail();
        $homeScienceId = $homeScience->id;
        $artAndDesign = Subject::whereName(SubjectsEnum::ARTDSGN->value)->firstOrFail();
        $artAndDesignId = $artAndDesign->id;
        $agriculture = Subject::whereName(SubjectsEnum::AGRIC->value)->firstOrFail();
        $agricultureId = $agriculture->id;
        $businessStudies = Subject::whereName(SubjectsEnum::BUZSTRDS->value)->firstOrFail();
        $businessStudiesId = $businessStudies->id;
        $computerStudies = Subject::whereName(SubjectsEnum::COMPSTRDS->value)->firstOrFail();
        $computerStudiesId = $computerStudies->id;
        $drawingAndDesign = Subject::whereName(SubjectsEnum::DRWNDGN->value)->firstOrFail();
        $drawingAndDesignId =  $drawingAndDesign->id;
        $french = Subject::whereName(SubjectsEnum::FRNCH->value)->firstOrFail();
        $frenchId = $french->id;
        $german = Subject::whereName(SubjectsEnum::GRMN->value)->firstOrFail();
        $germanId = $german->id;
        $arabic = Subject::whereName(SubjectsEnum::ARBC->value)->firstOrFail();
        $arabicId = $arabic->id;
        $signLanguage = Subject::whereName(SubjectsEnum::SGNLANG->value)->firstOrFail();
        $signLanguageId = $signLanguage->id;
        $music = Subject::whereName(SubjectsEnum::MSC->value)->firstOrFail();
        $musicId = $music->id;
        $woodWork = Subject::whereName(SubjectsEnum::WDWK->value)->firstOrFail();
        $woodWorkId = $woodWork->id;
        $metalWork = Subject::whereName(SubjectsEnum::MTWK->value)->firstOrFail();
        $metalWorkId = $metalWork->id;
        $buildingConstruction = Subject::whereName(SubjectsEnum::BUILDCON->value)->firstOrFail();
        $buildingConstructionId = $buildingConstruction->id;
        $powerMechanics = Subject::whereName(SubjectsEnum::PWRMC->value)->firstOrFail();
        $powerMechanicsId = $powerMechanics->id;
        $electricity = Subject::whereName(SubjectsEnum::ELEC->value)->firstOrFail();
        $electricityId =  $electricity->id;
        $aviationTechnology = Subject::whereName(SubjectsEnum::AVTEC->value)->firstOrFail();
        $aviationTechnologyId =  $aviationTechnology->id;
        
        $class = MyClass::whereId($classId)->first();
        $year = Year::whereId($yearId)->first();
        $term = Term::whereId($termId)->first();
        $exam = Exam::where(['id'=>$examId,'term_id'=>$termId,'year_id'=>$yearId])->first();
        
        $requestedFile = request()->file('file');
        if(($yearId === null) || ($termId === null) || ($examId === null) || ($classId === null) || ($exam === null) || (empty($requestedFile))){
            return back()->withErrors('Please fill in the required details before you proceed!');
        } 

        \Excel::import(new MarksGradesheetImport($yearId,$termId,$classId,$exam,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histAndGovId,$geogId,$homeScienceId,$artAndDesignId,$agricultureId,$businessStudiesId,$computerStudiesId,$drawingAndDesignId,$frenchId,$germanId,$arabicId,$signLanguageId,$musicId,$woodWorkId,$metalWorkId,$buildingConstructionId,$powerMechanicsId,$electricityId,$aviationTechnologyId),$requestedFile);

        \Session::put('success', $term->name." ".$class->name." ".$exam->name." ".'Grades Uploaded Successfully');

        return back();
    }

    public function generalGradesStore(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $classId = $request->class_id;
        $examId = $request->exam_id;

        if(($yearId === null) || ($termId === null) || ($examId === null) || ($classId === null)){
            return back()->withErrors('Please fill in the required details before you proceed!');
        }
        
        $class = MyClass::where('id',$classId)->first();
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where(['id'=>$examId,'term_id'=>$termId,'year_id'=>$yearId])->first();

        $requestedFile = request()->file('file');
        if(empty($requestedFile)){
            toastr()->error(ucwords('Please ensure you select the required excel sheet document before you proceed!'));
            return back()->withErrors('Please ensure you select the required excel sheet document before you proceed!');
        }
 
        \Excel::import(new GeneralGradesheetImport($yearId,$termId,$classId,$exam),$requestedFile);

        \Session::put('success', $year->year." ".$term->name." ".$class->name." ".$exam->name." ".'General Grades Uploaded Successfully');

        return back();
    }

    public function reportGeneralRemarks(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $classId = $request->class_id;

        if(($yearId === null) || ($termId === null) || ($classId === null)){
            return back()->withErrors('Please fill in all the required details before you proceed!');
        }
        
        $class = MyClass::where('id',$classId)->first();
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first(); 

        $requestedFile = request()->file('file');
        if(empty($requestedFile)){
            return back()->withErrors('Please ensure you select the required excel sheet document before you proceed!');
        } 

        \Excel::import(new ReportcardRemarksSheetImport($yearId,$termId,$classId),$requestedFile);

        return back()->withSuccess(ucwords($year->year." ".$term->name." ".$class->name." ".'Report Card General Comments Uploaded Successfully'));
    }

    public function reportSubjectGradesStore(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $classId = $request->class_id;
        $teacherId = $request->teacher_id;

        if(($yearId === null) || ($termId === null) || ($classId === null) || ($teacherId === null)){
            toastr()->error(ucwords('Please ensure you have filled all the required details!'));
            return back()->withErrors('Please ensure you have filled all the required details!');
        }

        $maths = Subject::whereName(SubjectsEnum::MATHS->value)->firstOrFail();
        $mathsId = $maths->id;
        $english = Subject::whereName(SubjectsEnum::ENG->value)->firstOrFail();
        $englishId = $english->id;
        $kisw = Subject::whereName(SubjectsEnum::KISW->value)->firstOrFail();
        $kiswId = $kisw->id;
        $chem = Subject::whereName(SubjectsEnum::CHEM->value)->firstOrFail();
        $chemId = $chem->id;
        $biology = Subject::whereName(SubjectsEnum::BIO->value)->firstOrFail();
        $bioId = $biology->id;
        $physics = Subject::whereName(SubjectsEnum::PHY->value)->firstOrFail();
        $physicsId = $physics->id;
        $cre = Subject::whereName(SubjectsEnum::CRE->value)->firstOrFail();
        $creId = $cre->id;
        $islam = Subject::whereName(SubjectsEnum::ISLM->value)->firstOrFail();
        $islamId = $islam->id;
        $histAndGov = Subject::whereName(SubjectsEnum::HISTANDGOV->value)->firstOrFail();
        $histAndGovId = $histAndGov->id;
        $geog = Subject::whereName(SubjectsEnum::GEOG->value)->firstOrFail();
        $geogId = $geog->id;
        $homeScience = Subject::whereName(SubjectsEnum::HOMESC->value)->firstOrFail();
        $homeScienceId = $homeScience->id;
        $artAndDesign = Subject::whereName(SubjectsEnum::ARTDSGN->value)->firstOrFail();
        $artAndDesignId = $artAndDesign->id;
        $agriculture = Subject::whereName(SubjectsEnum::AGRIC->value)->firstOrFail();
        $agricultureId = $agriculture->id;
        $businessStudies = Subject::whereName(SubjectsEnum::BUZSTRDS->value)->firstOrFail();
        $businessStudiesId = $businessStudies->id;
        $computerStudies = Subject::whereName(SubjectsEnum::COMPSTRDS->value)->firstOrFail();
        $computerStudiesId = $computerStudies->id;
        $drawingAndDesign = Subject::whereName(SubjectsEnum::DRWNDGN->value)->firstOrFail();
        $drawingAndDesignId =  $drawingAndDesign->id;
        $french = Subject::whereName(SubjectsEnum::FRNCH->value)->firstOrFail();
        $frenchId = $french->id;
        $german = Subject::whereName(SubjectsEnum::GRMN->value)->firstOrFail();
        $germanId = $german->id;
        $arabic = Subject::whereName(SubjectsEnum::ARBC->value)->firstOrFail();
        $arabicId = $arabic->id;
        $signLanguage = Subject::whereName(SubjectsEnum::SGNLANG->value)->firstOrFail();
        $signLanguageId = $signLanguage->id;
        $music = Subject::whereName(SubjectsEnum::MSC->value)->firstOrFail();
        $musicId = $music->id;
        $woodWork = Subject::whereName(SubjectsEnum::WDWK->value)->firstOrFail();
        $woodWorkId = $woodWork->id;
        $metalWork = Subject::whereName(SubjectsEnum::MTWK->value)->firstOrFail();
        $metalWorkId = $metalWork->id;
        $buildingConstruction = Subject::whereName(SubjectsEnum::BUILDCON->value)->firstOrFail();
        $buildingConstructionId = $buildingConstruction->id;
        $powerMechanics = Subject::whereName(SubjectsEnum::PWRMC->value)->firstOrFail();
        $powerMechanicsId = $powerMechanics->id;
        $electricity = Subject::whereName(SubjectsEnum::ELEC->value)->firstOrFail();
        $electricityId =  $electricity->id;
        $aviationTechnology = Subject::whereName(SubjectsEnum::AVTEC->value)->firstOrFail();
        $aviationTechnologyId =  $aviationTechnology->id;
        
        
        $class = MyClass::whereId($classId)->first();
        $year = Year::whereId($yearId)->first();
        $term = Term::whereId($termId)->first();
        $requestedFile = request()->file('file');

        if(empty($requestedFile)){
            toastr()->error(ucwords('Please ensure you select the required excel sheet document before you proceed!'));
            return back()->withErrors('Please ensure you select the required excel sheet document before you proceed!');
        } 

        \Excel::import(new ReportSubjectGradesheetImport($yearId,$termId,$classId,$teacherId,$mathsId,$englishId,$kiswId,$chemId,$bioId,$physicsId,$creId,$islamId,$histAndGovId,$geogId,$homeScienceId,$artAndDesignId,$agricultureId,$businessStudiesId,$computerStudiesId,$drawingAndDesignId,$frenchId,$germanId,$arabicId,$signLanguageId,$musicId,$woodWorkId,$metalWorkId,$buildingConstructionId,$powerMechanicsId,$electricityId,$aviationTechnologyId),$requestedFile);

        \Session::put('success', $term->name." ".$class->name." ".'Report Card Subject Average Grades Uploaded Successfully');

        return back();
    }

    public function reportMeanGradesStore(Request $request)
    {
        $yearId = $request->year_id;
        $termId = $request->term_id;
        $classId = $request->class_id;

        if(($yearId === null) || ($termId === null) || ($classId === null)){
            toastr()->error(ucwords('Please ensure you have filled all the required details!'));
            return back()->withErrors('Please ensure you have filled all the required details!');
        }
        
        $class = MyClass::where('id',$classId)->first();
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first(); 

        $requestedFile = request()->file('file');
        if(empty($requestedFile)){
            toastr()->error(ucwords('Please ensure you select the required excel sheet document before you proceed!'));
            return back()->withErrors('Please ensure you select the required excel sheet document before you proceed!');
        }

        \Excel::import(new ReportMeanGradesheetImport($yearId,$termId,$classId),$requestedFile);

        \Session::put('success', $year->year." ".$term->name." ".$class->name." ".'Report Card General Grades Uploaded Successfully');

        return back();
    }
}
