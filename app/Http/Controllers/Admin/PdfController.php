<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Auth;
use mikehaertl\wkhtmlto\Pdf as ChartPdf;
use Illuminate\Support\Str;
use HiFolks\Statistics\Freq;
use App\Models\Club;
use App\Models\School;
use App\Models\Student;
use App\Models\Stream;
use App\Models\Department;
use App\Models\StreamSubject;
use App\Models\ReportCard;
use App\Models\PdfGenerator;
use App\Models\MyClass;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Term;
use App\Models\Year;
use App\Models\Teacher;
use App\Models\ClassTotal;
use App\Models\StreamTotal;
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Models\ReportSubjectGrade;
use App\Models\ReportMeanGrade;
use App\Models\ReportRemark;
use App\Models\Dormitory;
use App\Enums\GradeTypeEnum;
use App\Charts\MarksChart;
use App\Events\ExamRecords;
use App\Services\StudentService;
use HiFolks\Statistics\Stat;
use HiFolks\Statistics\Statistics;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PdfController extends Controller
{
    protected $studentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }

    public function schoolStudents()
    {
        $school = Auth::user()->admin->school;
        $students = $school->students()->with('stream','school','dormitory','user')->inRandomOrder()->get();
        if($students->isEmpty()){
            toastr()->error(ucwords('This school has no students at the moment!'));
            return back();
        }
        $males = $school->males();
        $females = $school->females();
        $title = 'Students List';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.school_students',compact('school','students','title','males','females','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function schoolTeachers()
    {
        $school = Auth::user()->school;
        $schoolTeachers = $school->teachers()->with('streams','school','user')->inRandomOrder()->get();
        if($schoolTeachers->isEmpty()){
            toastr()->error(ucwords('This school has no teachers at the moment!'));
            return back();
        }
        $title = 'Teachers List';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.school_teachers',compact('school','schoolTeachers','title','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function schoolParents()
    {
        $school = Auth::user()->school;
        $schoolParents = $school->parents()->with('school','user')->inRandomOrder()->get();
        if($schoolParents->isEmpty()){
            toastr()->error(ucwords('This school has no parents at the moment!'));
            return back();
        }
        $title = 'Parents List';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.school_parents',compact('school','schoolParents','title','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function classStudents(Request $request)
    {
        $classId = $request->class;
        if(is_null($classId)){
            return back()->withErrors('Ensure you select class name first before you proceed');
        }
        $class = MyClass::whereId($classId)->firstOrFail();
        $classStudents = $class->students()->with('stream.stream_section','school','dormitory','user')->inRandomOrder()->get();
        $school = Auth::user()->school;
        $title = $class->name." ".'Students List';
        $downloadTitle = $school->name." ".$title;
        $males = $class->males();
        $females = $class->females();

        if($classStudents->isEmpty()){
            return back()->with('error','This class has no students at the moment!');
        }

        $pdf = PDF::loadView('admin.pdf.class_students',compact('class','classStudents','title','school','males','females','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function streamStudents(Request $request)
    {
        $streamId = $request->stream;
        if(is_null($streamId)){
            return back()->withErrors('Ensure you select the stream name first before you proceed');
        }
        $stream = Stream::whereId($streamId)->firstOrFail();
        $streamStudents = $stream->students()->with('stream','school','dormitory','user')->inRandomOrder()->get();
        $school = Auth::user()->school;
        $title = $stream->name." ".'Students List';
        $downloadTitle = $school->name." ".$title;
        $males = $stream->males();
        $females = $stream->females();

        if($streamStudents->isEmpty()){
            return back()->with('error','Students notyet assigned to'." ".$stream->name);
        }

        $pdf = PDF::loadView('admin.pdf.stream_students',compact('stream','streamStudents','title','school','males','females','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function streamRegister(Request $request)
    {
        $streamId = $request->stream;
        if(is_null($streamId)){
            return back()->withErrors('Ensure you select the stream name first before you proceed');
        }
        $stream = Stream::whereId($streamId)->firstOrFail();
        $streamStudents = $stream->students()->with('stream','school','user')->get();
        $school = Auth::user()->school;
        $title = $stream->name." ".'Register Form';
        $downloadTitle = $school->name." ".$title;
        $males = $stream->males();
        $females = $stream->females();

        if($streamStudents->isEmpty()){
            return back()->with('error','Students notyet assigned to'." ".$stream->name);
        }

        $pdf = PDF::loadView('admin.pdf.stream_register',compact('stream','streamStudents','title','school','males','females','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function streamTeachers(Request $request)
    {
        $streamId = $request->stream;
        if(is_null($streamId)){
            return back()->withErrors('Ensure you select the stream first before you proceed!');
        }
        $stream = Stream::whereId($streamId)->firstOrFail();
        $streamSubjects = StreamSubject::where('stream_id',$streamId)->with('teacher.user','subject')->inRandomOrder()->get();
        if($streamSubjects->isEmpty()){
            return back()->withErrors('The teachers notyet assigned to'." ".$stream->name);
        }
        $school = Auth::user()->school;
        $title = $stream->name." ".'Teachers';
        $downloadTitle = $school->name." ".$title;

        $pdf = PDF::loadView('admin.pdf.stream_teachers',compact('stream','streamSubjects','title','school','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function schoolClubs()
    {
        $school = Auth::user()->school;
        $schoolClubs = $school->clubs()->with('school','teachers','subordinates','students')->get();
        if($schoolClubs->isEmpty()){
            return back()->withErrors($school->name." "."has no clubs at the moment!");
        }
        $title = "Clubs List";
        $downloadTitle = $school->name." ".$title;

        $pdf = PDF::loadView('admin.pdf.school_clubs',['school'=>$school,'schoolClubs'=>$schoolClubs,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function clubStudents(Request $request)
    {
        $clubId = $request->club;
        if(is_null($clubId)){
            return back()->withErrors('Ensure you select club name first before you proceed');
        }
        $club = Club::whereId($clubId)->firstOrFail();
        $clubStudents = $club->students()->with('clubs','stream','user')->get();
        if($clubStudents->isEmpty()){
            toastr()->error(ucwords("The students notyet joined"." ".$club->name));
            return back();
        }
        $school = Auth::user()->school;
        $title = $club->name." ".'Students';
        $downloadTitle = $school->name." ".$title;

        $pdf = PDF::loadView('admin.pdf.club_students',['club'=>$club,'school'=>$school,'clubStudents'=>$clubStudents,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function clubTeachers(Request $request)
    {
        $clubId = $request->club;
        if(is_null($clubId)){
            return back()->withErrors('Ensure you select club name first before you proceed');
        }
        $club = Club::whereId($clubId)->firstOrFail();
        $clubTeachers = $club->teachers()->with('clubs','user')->get();
        $school = $club->school;
        $title = $club->name." ".'Teachers';
        $downloadTitle = $school->name." ".$title;

        if($clubTeachers->isEmpty()){
            return back()->withErrors('The teachers notyet assigned to this club!');
        }
        $pdf = PDF::loadView('admin.pdf.club_teachers',['club'=>$club,'school'=>$school,'clubTeachers'=>$clubTeachers,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function schoolDepts()
    {
        $school = Auth::user()->school;
        $schoolDepts = $school->departments()->with('dept_section')->get();
        $title = "Departments List";
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.departments',['school'=>$school,'schoolDepts'=>$schoolDepts,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function deptTeachers(Request $request)
    {
        $deptId = $request->department;
        if(is_null($deptId)){
            return back()->withErrors('Select the department name before you proceed');
        }
        $department = Department::whereId($deptId)->firstOrFail();
        $deptTeachers = $department->teachers()->with('user')->get();
        if($deptTeachers->isEmpty()){
            return back()->withErrors("Teachers notyet assigned to"." ".$department->name);
        }

        $school = Auth::user()->school;
        $title = $department->name." ".'Teachers';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.department_teachers',['department'=>$department,'school'=>$school,'deptTeachers'=>$deptTeachers,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function deptSubordinates(Request $request)
    {
        $deptId = $request->department;
        if(is_null($deptId)){
            return back()->withErrors('Select the department name before you proceed');
        }
        $department = Department::whereId($deptId)->firstOrFail();
        $deptSubordinates = $department->subordinates()->with('user')->get();
        if($deptSubordinates->isEmpty()){
            return back()->withErrors("Subordinate staffs notyet assigned to"." ".$department->name);
        }

        $school = Auth::user()->school;
        $title = $department->name." ".'Subordinate Staffs';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.department_subordinates',['department'=>$department,'school'=>$school,'deptSubordinates'=>$deptSubordinates,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function pdfGenerator(PdfGenerator $pdfGenerator)
    {
        $school = $pdfGenerator->school;
        $code = $data['code'] = strtoupper(Str::random(15));
        $title = $school->name." ".'Generated Pdf Document';
        $downloadTitle = $title." "."CODE: "." ".$code;
        $pdf = PDF::loadView('admin.pdf.pdf-generators',['pdfGenerator'=>$pdfGenerator,'school'=>$school,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true,'isPhpEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function letterHead()
    {
        $school = Auth::user()->school;
        $title = $school->name." ".'Letter Head';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.letter_head',['school'=>$school,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/2);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper('Original Copy'),null,70, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function instantDownload(School $school,Request $request)
    {
        $content = $request->content;
        $title = $school->name;
        $downloadTitle = $title;
        $pdf = PDF::loadView('admin.pdf.instant_download',['school'=>$school,'title'=>$title,'content'=>$content,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function schoolSubordinates()
    {
        $school = Auth::user()->school;
        $schoolSubStaffs = $school->subordinates()->with('school','user')->inRandomOrder()->get();
        if($schoolSubStaffs->isEmpty()){
            toastr()->error(ucwords('This school has no sub staffs at the moment!'));
            return back();
        }
        $title ='Subordinate Staffs';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.subordinade_staffs',['school'=>$school,'schoolSubStaffs'=>$schoolSubStaffs,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper('Subordinate Staffs'),null,50, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function studentDetails(Request $request)
    {
        $studentId = $request->student;
        if(is_null($studentId)){
           toastr()->error(ucwords('Ensure you select the student name first before you proceed'));
            return back(); 
        }
        $student = Student::whereId($studentId)->firstOrFail();
        if(is_null($student->image)){
            toastr()->error(ucwords('Please upload the student photo first!!!'));
            return back();
        }
        
        $school = Auth::user()->school;
        $title = 'Student Details';
        $downloadTitle = $school->name." ".": ".$student->full_name." "."Details";
        $vv = collect($student->stream->subjects()->pluck('name'));
        $streamSubjects = $vv->toArray();

        $pdf = PDF::loadView('admin.pdf.student_details',['student'=>$student,'school'=>$school,'title'=>$title,'streamSubjects'=>$streamSubjects,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/2);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,50, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf',array("Attachment" => 0)); 
    }

    public function dormitoryStudents(Request $request)
    {
        $dormitoryId = $request->dormitory;
        $dormitory = Dormitory::whereId($dormitoryId)->firstOrFail();
        $dormitoryStudents = $dormitory->students()->with('stream','school','user','dormitory','bed_number')->inRandomOrder()->get();
        $school = Auth::user()->school;
        $title = $dormitory->name." ".'Dormitory Students';
        $downloadTitle = $school->name." ".$title;

        if($dormitoryStudents->isEmpty()){
            return back()->with('error','This dormitory has no students at the moment!');
        }

        $pdf = PDF::loadView('admin.pdf.dormitory_students',compact('dormitory','dormitoryStudents','title','school','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }

    public function  studentExamResults(Request $request)
    {
        $currentYear = date('Y');
        $year = Year::where('year',$currentYear)->first();
        $currentTerm = Term::where('status',1)->first();
        $currentExam = Exam::where(['status'=>1,'year_id'=>$year->id,'term_id'=>$currentTerm->id])->first();
        $yearId = $year->id;
        $termId = $currentTerm->id;
        $examId = $currentExam->id;

        $studentId = $request->student;
        if(is_null($studentId)){
            return back()->withErrors('Select the student name first before you proceed');
        }

        $student = Student::whereId($studentId)->firstOrFail();
        $streamId = $student->stream->id;
        $name = $student->user->full_name;
        $marks = streamMarks($yearId,$termId,$examId,$streamId);

        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $stream = Stream::where(['id'=>$streamId])->first();
        $school = auth()->user()->school;

        if(($yearId === null) || ($termId === null) || ($examId === null) || ($streamId === null) || ($exam->year->id != $yearId) || ($exam->term->id != $termId) || ($examId != $exam->id) || ($marks->isEmpty())){
            return back()->withErrors('It appears the resulst are not ready!');
        }

        $mark = mark($yearId,$termId,$streamId,$name);
        $markName = $mark->name;
        //Exam Grades
        $examGrades = Grade::with('class','year','term','subject','exam','teacher')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        $generalGrades = GeneralGrade::with('class','year','term','exam')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();

        $title = $year->year." ".$term->name." ".$exam->name." ".'Results';
        $downloadTitle = $markName." ".$title;
        $pdf = PDF::loadView('admin.pdf.student_results',compact('name','marks','year','term','exam','stream','school','title','markName','examGrades','generalGrades','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a5','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/2);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf',array("Attachment" => 0));
    }

    public function classMarkSheet(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $classId = $request->class;
        $passMark = $request->pass_mark;

        if((is_null($yearId)) || (is_null($termId)) || (is_null($examId)) || (is_null($classId))){
            return back()->withErrors('Please ensure you have filled in all the required details!');
        } 

        $marks= classMarks($yearId,$termId,$examId,$classId);
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $class = MyClass::where('id',$classId)->first();
        $stream = Stream::where('class_id',$classId)->first();
        $school = auth()->user()->school;

        $examGrades = Grade::with('class','year','term','subject','exam','teacher')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get();
        $generalGrades = GeneralGrade::with('class','year','term','exam')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get();
        // Male students count
        $males = $class->males();
        // Female students count
        $females = $class->females();

        //Start of general subjects mean scores calculations
        $maths = $marks->pluck('mathematics','name');
        $english = $marks->pluck('english','name');
        $kiswahili = $marks->pluck('kiswahili','name');
        $chemistry = $marks->pluck('chemistry','name');
        $biology = $marks->pluck('biology','name');
        $physics = $marks->pluck('physics','name');
        $cre = $marks->pluck('cre','name');
        $islam = $marks->pluck('islam','name');
        $history = $marks->pluck('history','name');
        $geography = $marks->pluck('geography','name');
        //End of mean subjects mean score calculations

        $totals = $marks->pluck('total','name');
        $standings = $totals->toArray();
        $rankings = array();
        arsort($standings);
        $rank = 1;
        $tie_rank = 0;
        $prev_score = -1;
        foreach($standings as $name => $score){
            if($score != $prev_score){
                //this score is not a tie
                $count = 0;
                $prev_score = $score;
                $rankings[$name] = array('score' => $score,'rank'=>$rank);
            } else {
                //this is a tie
                $prev_score = $score;
                $rank --;
                if($count++ == 0){
                    $tie_rank = $rank;
                }
                $rankings[$name] = array('score'=>$score,'rank'=>$tie_rank);
            }
            $rank++;
        }
        $rankings;// End Marksheet Ranking
        $title = $term->name." ".$class->name." ".$exam->name." ".'Results';
        $downloadTitle = $school->name." "."-"." ".$title;
        $classMinscore = $marks->avg('student_minscore');//Average of class minscore
        //Total Marks Frequencies
        $totalMarks = $marks->pluck('total','name');
        $x = $totalMarks->toArray();
        $totalMarksFrequencies = Statistics::make($x);

        // call the event
        event(new ExamRecords($yearId,$termId,$examId,$classId,$school,$marks));

        $pdf = PDF::loadView('admin.pdf.class_marksheet',compact('marks','examGrades','generalGrades','exam','class','school','year','term','title','rankings','passMark','totals','maths','english','kiswahili','chemistry','biology','physics','cre','islam','history','geography','classMinscore','females','males','totalMarksFrequencies','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true,'isPhpEnabled'=>true,'isJavascriptEnabled'=>true])->setPaper('a3','landscape');

        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
    
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->page_script('$pdf->set_opacity(.2, "Multiply");');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download(Str::slug($downloadTitle).'.pdf',array("Attachment" => 0));
    }

    public function streamMarkSheet(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $streamId = $request->stream;
        $passMark = $request->pass_mark;

        if((is_null($yearId)) || (is_null($termId)) || (is_null($examId)) || (is_null($streamId))){
            return back()->withErrors('Please ensure you have filled in all the required details!');
        } 

        $marks = streamMarks($yearId,$termId,$examId,$streamId);
        $year = Year::where('id',$yearId)->firstOrFail();
        $term = Term::where('id',$termId)->firstOrFail();
        $exam = Exam::where('id',$examId)->firstOrFail();
        $stream = Stream::where('id',$streamId)->firstOrFail();
        $school = auth()->user()->school;

        $examGrades = Grade::with('class','year','term','subject','exam','teacher')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        $generalGrades = GeneralGrade::with('class','year','term','exam')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        // Male students count
        $males = $stream->students()->where(['gender'=>'Male'])->count();
        // Female students count
        $females = $stream->students()->where(['gender'=>'Female'])->count();

        //Start of stream subjects mean scores calculations
        $maths = $marks->pluck('mathematics','name');
        $english = $marks->pluck('english','name');
        $kiswahili = $marks->pluck('kiswahili','name');
        $chemistry = $marks->pluck('chemistry','name');
        $biology = $marks->pluck('biology','name');
        $physics = $marks->pluck('physics','name');
        $cre = $marks->pluck('cre','name');
        $islam = $marks->pluck('islam','name');
        $history = $marks->pluck('history','name');
        $geography = $marks->pluck('geography','name');
        //End of mean subjects mean score calculations
        //Start of ranking
        $totals = $marks->pluck('total','name');
        $standings = $totals->toArray();
        $rankings = array();
        arsort($standings);
        $rank = 1;
        $tie_rank = 0;
        $prev_score = -1;
        foreach($standings as $name => $score){
            if($score != $prev_score){
                //this score is not a tie
                $count = 0;
                $prev_score = $score;
                $rankings[$name] = array('score' => $score,'rank'=>$rank);
            } else {
                //this is a tie
                $prev_score = $score;
                $rank --;
                if($count++ == 0){
                    $tie_rank = $rank;
                }
                $rankings[$name] = array('score'=>$score,'rank'=>$tie_rank);
            }
            $rank++;
        }
        $rankings;

        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $stream = Stream::where('id',$streamId)->first();
        $school = auth()->user()->school;
        $streamStudents = $stream->students()->with('class','school')->get();

        $streamMiniscore = (round($maths->avg(),1) + round($english->avg(),1) + round($kiswahili->avg(),1) + round($chemistry->avg(),1) + round($biology->avg(),1) + round($physics->avg(),1) + round($cre->avg(),1) + round($islam->avg(),1) + round($history->avg(),1) + round($geography->avg(),1))/5;

        $title = $term->name." ".$stream->name." ".$exam->name." ".'Results';
        $downloadTitle = $school->name." "."-"." ".$title;
        $pdf = PDF::loadView('admin.pdf.stream_marksheet',compact('marks','examGrades','generalGrades','exam','stream','school','title','rankings','passMark','totals','maths','english','kiswahili','chemistry','biology','physics','cre','islam','history','geography','streamStudents','males','females','streamMiniscore','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a3','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        return $pdf->download($downloadTitle.'.pdf',array("Attachment" => 0));
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
        $students = Student::with('school','libraries','teachers','class','stream','clubs','user')->get();

        return view('admin.pdf.twoexams_reportcardform',compact('years','terms','classes','streams','exams','students','teachers','reportExams'));
    }

    public function threeExamsReportCardForm()
    {
        $years = Year::all();
        $terms = Term::all();
        $classes = MyClass::all();
        $streams = Stream::all();
        $exams = Exam::all();
        $reportExams = Exam::with('school','year','term')->get();
        $teachers = Teacher::with('user')->get();
        $students = Student::with('school','libraries','teachers','class','stream','clubs','user')->get();

        return view('admin.pdf.threeexams_reportcardform',compact('years','terms','classes','streams','exams','students','teachers','reportExams'));
    }

    public function twoExamsReportCard(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $streamId = $request->stream;
        $name = Str::lower($request->name);
        $closingDate = $request->closing_date;
        $openingDate = $request->opening_date;

        if((is_null($yearId)) || (is_null($termId)) || (is_null($streamId)) || (is_null($name)) || (is_null(Auth::user()->school->image)) || (is_null($closingDate)) || (is_null($openingDate))){
            toastr()->error(ucwords('Please ensure you have filled all the required details!'));
            return back();
        }

        $examIds = $request->exams;
        if(is_null($examIds)){
            return back()->withErrors('Exams Not Selected!');
        }
        
        $obtainedIds = Exam::whereIn('id',$examIds)->get();
        $countObtainedIds = $obtainedIds->count();
        if(($countObtainedIds < 2) || ($countObtainedIds > 2)){
            return back()->withErrors('Only two exams are allowed!');
        }
        $array = $obtainedIds->toArray();
        $examOneId = $array[0];
        $examTwoId  = $array[1];

        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();
        $stream = Stream::where(['id'=>$streamId])->first();
        $examOne = Exam::where(['id'=>$examOneId,'term_id'=>$termId,'year_id'=>$yearId])->firstOrFail();
        $examTwo = Exam::where(['id'=>$examTwoId,'term_id'=>$termId,'year_id'=>$yearId])->firstOrFail();

        $mark = mark($yearId,$termId,$streamId,$name);
        $markName = $mark->name;

        if(($yearId === null) || ($termId === null) || ($examOneId === null) || ($examTwoId === null) || empty($name) || (Auth::user()->school->image === null) || ($streamId === null) || ($markName === null)){
            toastr()->error(ucwords('Please ensure you have filled all the required details!'));
            return back();
        }
 
        $examOneMark = Mark::where(['name'=>$markName,'stream_id'=>$stream->id,'exam_id'=>$examOneId])->first();
        $examTwoMark = Mark::where(['name'=>$markName,'stream_id'=>$stream->id,'exam_id'=>$examTwoId])->first();

        $mathsAvg = Stat::mean([$examOneMark->mathematics,$examTwoMark->mathematics]);
        $engAvg = Stat::mean([$examOneMark->english,$examTwoMark->english]);
        $kiswAvg = Stat::mean([$examOneMark->kiswahili,$examTwoMark->kiswahili]);
        $chemAvg = Stat::mean([$examOneMark->chemistry,$examTwoMark->chemistry]);
        $bioAvg = Stat::mean([$examOneMark->biology,$examTwoMark->biology]);
        $physicsAvg = Stat::mean([$examOneMark->physics,$examTwoMark->physics]);
        $creAvg = Stat::mean([$examOneMark->cre,$examTwoMark->cre]);
        $islamAvg = Stat::mean([$examOneMark->islam,$examTwoMark->islam]);
        $histAvg = Stat::mean([$examOneMark->history,$examTwoMark->history]);
        $geogAvg = Stat::mean([$examOneMark->geography,$examTwoMark->geography]);
        

        //Exams Totals
        $examOneTotal = $examOneMark->total;
        $examTwoTotal = $examTwoMark->total;
        $overalTotal = collect([$examOneTotal,$examTwoTotal]);
        $overalTotalAvg = $overalTotal->avg();

        //Start of overal class ranking
        $totals = ClassTotal::all();
        $classTotals = $totals->pluck('mark_total','name');
        $classPositions = $classTotals->toArray();
        $classRankings = array();
        arsort($classPositions);
        $rank = 1;
        $tie_rank = 0;
        $prev_score = -1;
        foreach($classPositions as $mark_total => $score){
            if($score != $prev_score){
                //this score is not a tie
                $count = 0;
                $prev_score = $score;
                $classRankings[$mark_total] = array('score' => $score,'rank'=>$rank);
            } else {
                //this is a tie
                $prev_score = $score;
                if($count++ == 0){
                    $tie_rank = $rank - 1;
                }
                $classRankings[$mark_total] = array('score'=>$score,'rank'=>$tie_rank);
            }
            $rank++;
        }
        $classRankings; 
        $clasPositions = collect($classRankings); //End of Overal Class Ranking
        //Get Overal Position
        $overalPosition = overalPosition($classRankings,$markName);

        //Start of Stream ranking
        $stTotals = StreamTotal::all();
        $streamTotals = $stTotals->pluck('mark_total','name');
        $streamPositions = $streamTotals->toArray();
        $streamRankings = array();
        arsort($streamPositions);
        $rank = 1;
        $tie_rank = 0;
        $prev_score = -1;
        foreach($streamPositions as $mark_total => $score){
            if($score != $prev_score){
                //this score is not a tie
                $count = 0;
                $prev_score = $score;
                $streamRankings[$mark_total] = array('score' => $score,'rank'=>$rank);
            } else {
                //this is a tie
                $prev_score = $score;
                if($count++ == 0){
                    $tie_rank = $rank - 1;
                }
                $streamRankings[$mark_total] = array('score'=>$score,'rank'=>$tie_rank);
            }
            $rank++;
        }

        $streamRankings; 
        $strmPositions = collect($streamRankings); //End of Stream Ranking
        //Get Stream Position
        $streamPosition = streamPosition($streamRankings,$markName);
        $school = auth()->user()->school;
        $title = "Student Report Card";
        $downloadTitle = $school->name." "."-"." ".$name." ".$year->year." ".$term->name." "."Report Card";

        // Exam One Subject Grades
        $examOneMathsGrade = examOneMathsGrade($examOneMark,$markName);
        $examOneEnglishGrade = examOneEnglishGrade($examOneMark,$markName);
        $examOneKiswGrade = examOneKiswahiliGrade($examOneMark,$markName);
        $examOneChemGrade = examOneChemistryGrade($examOneMark,$markName);
        $examOneBioGrade = examOneBiologyGrade($examOneMark,$markName);
        $examOnePhysicsGrade = examOnePhysicsGrade($examOneMark,$markName);
        $examOneCREGrade = examOneCREGrade($examOneMark,$markName);
        $examOneIslamGrade = examOneIslamGrade($examOneMark,$markName);
        $examOneHistGrade = examOneHistoryGrade($examOneMark,$markName);
        $examOneGeogGrade = examOneGeogGrade($examOneMark,$markName);

        // Exam Two Subject Grades
        $examTwoMathsGrade = examTwoMathsGrade($examTwoMark,$markName);
        $examTwoEnglishGrade = examTwoEnglishGrade($examTwoMark,$markName);
        $examTwoKiswGrade = examTwoKiswahiliGrade($examTwoMark,$markName);
        $examTwoChemGrade = examTwoChemistryGrade($examTwoMark,$markName);
        $examTwoBioGrade = examTwoBiologyGrade($examTwoMark,$markName);
        $examTwoPhysicsGrade = examTwoPhysicsGrade($examTwoMark,$markName);
        $examTwoCREGrade = examTwoCREGrade($examTwoMark,$markName);
        $examTwoIslamGrade = examTwoIslamGrade($examTwoMark,$markName);
        $examTwoHistGrade = examTwoHistoryGrade($examTwoMark,$markName);
        $examTwoGeogGrade = examTwoGeogGrade($examTwoMark,$markName);


        //Perform Cumulative Subjects Grade Points
        //Get Maths GPA 
        $examOneMathsGradePoints = examOneMathsGradePoints($examOneMark,$markName);
        $examTwoMathsGradePoints = examTwoMathsGradePoints($examTwoMark,$markName);
        $mathsCumulativePoints = Stat::mean([$examOneMathsGradePoints,$examTwoMathsGradePoints]);
        //Get English GPA 
        $examOneEnglishGradePoints = examOneEnglishGradePoints($examOneMark,$markName);
        $examTwoEnglishGradePoints = examTwoEnglishGradePoints($examTwoMark,$markName);
        $englishCumulativePoints = Stat::mean([$examOneEnglishGradePoints,$examTwoEnglishGradePoints]);
        //Get Kiswahili GPA 
        $examOneKiswahiliGradePoints = examOneKiswahiliGradePoints($examOneMark,$markName);
        $examTwoKiswahiliGradePoints = examTwoKiswahiliGradePoints($examTwoMark,$markName);
        $kiswCumulativePoints = Stat::mean([$examOneKiswahiliGradePoints,$examTwoKiswahiliGradePoints]);
        //Get Chemistry GPA 
        $examOneChemGradePoints = examOneChemistryGradePoints($examOneMark,$markName);
        $examTwoChemGradePoints = examTwoChemistryGradePoints($examTwoMark,$markName);
        $chemCumulativePoints = Stat::mean([$examOneChemGradePoints,$examTwoChemGradePoints]);
        //Get Biology GPA 
        $examOneBioGradePoints = examOneBiologyGradePoints($examOneMark,$markName);
        $examTwoBioGradePoints = examTwoBiologyGradePoints($examTwoMark,$markName);
        $bioCumulativePoints = Stat::mean([$examOneBioGradePoints,$examTwoBioGradePoints]);
        //Get Physics GPA 
        $examOnePhysicsGradePoints = examOnePhysicsGradePoints($examOneMark,$markName);
        $examTwoPhysicsGradePoints = examTwoPhysicsGradePoints($examTwoMark,$markName);
        $physicsCumulativePoints = Stat::mean([$examOnePhysicsGradePoints,$examTwoPhysicsGradePoints]);
        //Get CRE GPA 
        $examOneCREGradePoints = examOneCREGradePoints($examOneMark,$markName);
        $examTwoCREGradePoints = examTwoCREGradePoints($examTwoMark,$markName);
        $creCumulativePoints = Stat::mean([$examOneCREGradePoints,$examTwoCREGradePoints]);
        //Get Islam GPA 
        $examOneIslamGradePoints = examOneIslamGradePoints($examOneMark,$markName);
        $examTwoIslamGradePoints = examTwoIslamGradePoints($examTwoMark,$markName);
        $islamCumulativePoints = Stat::mean([$examOneIslamGradePoints,$examTwoIslamGradePoints]);
        //Get History GPA 
        $examOneHistGradePoints = examOneHistoryGradePoints($examOneMark,$markName);
        $examTwoHistGradePoints = examTwoHistoryGradePoints($examTwoMark,$markName);
        $histCumulativePoints = Stat::mean([$examOneHistGradePoints,$examTwoHistGradePoints]);
        //Get GHC GPA 
        $examOneGeogGradePoints = examOneGeogGradePoints($examOneMark,$markName);
        $examTwoGeogGradePoints = examTwoGeogGradePoints($examTwoMark,$markName);
        $geogCumulativePoints = Stat::mean([$examOneGeogGradePoints,$examTwoGeogGradePoints]);

        $totalCumulativePoints = collect([$mathsCumulativePoints,$englishCumulativePoints,$kiswCumulativePoints,$chemCumulativePoints,$bioCumulativePoints,$physicsCumulativePoints,$creCumulativePoints,$islamCumulativePoints,$histCumulativePoints,$geogCumulativePoints])->sum();
        
        $cumulativePointsAvg = $totalCumulativePoints/5;
        
        //Overal GPA (Addition of all Cumulative Points Devide by Number of Units/Subjects Taken by the Student)
        $overalGPA = round($cumulativePointsAvg,1);

        //General Grade Each Exam
        $examOneGenGrade = examOneGeneralGrade($examOneMark,$examOne,$examOneTotal);
        $examTwoGenGrade = examTwoGeneralGrade($examTwoMark,$examTwo,$examTwoTotal);
        //General Report Card Comment
        $reportGeneralRemark = reportGeneralRemark($yearId,$termId,$stream,$year,$term,$overalTotalAvg);
        //Report Card Subject Average Grades
        $reportSubjectGrades = ReportSubjectGrade::with('class','year','term','subject')->where(['term_id'=>$termId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        //Report Card General Grades
        $reportMeanGrades = ReportMeanGrade::with('class','year','term')->where(['term_id'=>$termId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        $streamStudents = $stream->students()->with('school','libraries','teachers','class','stream','clubs','payments','payment_records','marks','user')->get();

        $pdf = PDF::loadView('admin.pdf.twoexams_reportcard',compact('school','title','examOne','examTwo','examOneMark','examTwoMark','mathsAvg','engAvg','kiswAvg','chemAvg','bioAvg','physicsAvg','creAvg','islamAvg','histAvg','geogAvg','year','term','overalTotalAvg','openingDate','closingDate','overalPosition','streamPosition','stream','examOneTotal','examTwoTotal','name','markName','examOneMathsGrade','examOneEnglishGrade','examOneKiswGrade','examOneChemGrade','examOneBioGrade','examOnePhysicsGrade','examOneCREGrade','examOneIslamGrade','examOneHistGrade','examOneGeogGrade','examTwoMathsGrade','examTwoEnglishGrade','examTwoKiswGrade','examTwoChemGrade','examTwoBioGrade','examTwoPhysicsGrade','examTwoCREGrade','examTwoIslamGrade','examTwoHistGrade','examTwoGeogGrade','examOneGenGrade','examTwoGenGrade','overalGPA','reportGeneralRemark','mark','streamStudents','reportSubjectGrades','reportMeanGrades','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/2);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf',array("Attachment" => 0));
    } 

    public function threeExamsReportCard(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $streamId = $request->stream;
        $name = Str::lower($request->name);
        $closingDate = $request->closing_date;
        $openingDate = $request->opening_date;

        $examIds = $request->exams;
        if(is_null($examIds)){
            return back()->withErrors('Exams Not Selected!');
        }
        
        $obtainedIds = Exam::whereIn('id',$examIds)->get();
        $countObtainedIds = $obtainedIds->count();
        if(($countObtainedIds < 3) || ($countObtainedIds > 3)){
            return back()->withErrors('Only three exams are allowed!');
        }

        $array = $obtainedIds->toArray();
        $examOneId = $array[0];
        $examTwoId  = $array[1];
        $examThreeId = $array[2];

        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();
        $stream = Stream::where(['id'=>$streamId])->first();
        $examOne = Exam::where(['id'=>$examOneId,'term_id'=>$termId,'year_id'=>$yearId])->firstOrFail();
        $examTwo = Exam::where(['id'=>$examTwoId,'term_id'=>$termId,'year_id'=>$yearId])->firstOrFail();
        $examThree = Exam::where(['id'=>$examThreeId,'term_id'=>$termId,'year_id'=>$yearId])->firstOrFail(); 

        $mark = mark($yearId,$termId,$streamId,$name);
        $markName = $mark->name;

        if(($yearId === null) || ($termId === null) || ($examOneId === null) || ($examTwoId === null) || ($examThreeId === null) || empty($name) || (Auth::user()->school->image === null) || ($streamId === null) || ($markName === null)){
            return back()->withErrors('Please ensure you have filled in the required details!');
        }
 
        $examOneMark = Mark::where(['name'=>$markName,'stream_id'=>$stream->id,'exam_id'=>$examOneId])->first();
        $examTwoMark = Mark::where(['name'=>$markName,'stream_id'=>$stream->id,'exam_id'=>$examTwoId])->first();
        $examThreeMark = Mark::where(['name'=>$markName,'stream_id'=>$stream->id,'exam_id'=>$examThreeId])->first();

        $mathsAvg = Stat::mean([$examOneMark->mathematics,$examTwoMark->mathematics,$examThreeMark->mathematics]);
        $engAvg = Stat::mean([$examOneMark->english,$examTwoMark->english,$examThreeMark->english]);
        $kiswAvg = Stat::mean([$examOneMark->kiswahili,$examTwoMark->kiswahili,$examThreeMark->kiswahili]);
        $chemAvg = Stat::mean([$examOneMark->chemistry,$examTwoMark->chemistry,$examThreeMark->chemistry]);
        $bioAvg = Stat::mean([$examOneMark->biology,$examTwoMark->biology,$examThreeMark->biology]);
        $physicsAvg = Stat::mean([$examOneMark->physics,$examTwoMark->physics,$examThreeMark->physics]);
        $creAvg = Stat::mean([$examOneMark->cre,$examTwoMark->cre,$examThreeMark->cre]);
        $islamAvg = Stat::mean([$examOneMark->islam,$examTwoMark->islam,$examThreeMark->islam]);
        $histAvg = Stat::mean([$examOneMark->history,$examTwoMark->history,$examThreeMark->history]);
        $geogAvg = Stat::mean([$examOneMark->geography,$examTwoMark->geography,$examThreeMark->geography]);  

        //Exams Totals
        $examOneTotal = $examOneMark->total;
        $examTwoTotal = $examTwoMark->total;
        $examThreeTotal = $examThreeMark->total;
        $overalTotal = collect([$examOneTotal,$examTwoTotal,$examThreeTotal]);
        $overalTotalAvg = $overalTotal->avg();

        //Start of overal class ranking
        $totals = ClassTotal::all();
        $classTotals = $totals->pluck('mark_total','name');
        $classPositions = $classTotals->toArray();
        $classRankings = array();
        arsort($classPositions);
        $rank = 1;
        $tie_rank = 0;
        $prev_score = -1;
        foreach($classPositions as $mark_total => $score){
            if($score != $prev_score){
                //this score is not a tie
                $count = 0;
                $prev_score = $score;
                $classRankings[$mark_total] = array('score' => $score,'rank'=>$rank);
            } else {
                //this is a tie
                $prev_score = $score;
                if($count++ == 0){
                    $tie_rank = $rank - 1;
                }
                $classRankings[$mark_total] = array('score'=>$score,'rank'=>$tie_rank);
            }
            $rank++;
        }

        $classRankings; 
        $clasPositions = collect($classRankings); //End of Overal Class Ranking
        //Get Overal Position
        $overalPosition = overalPosition($classRankings,$markName);

        //Start of Stream ranking
        $stTotals = StreamTotal::all();
        $streamTotals = $stTotals->pluck('mark_total','name');
        $streamPositions = $streamTotals->toArray();
        $streamRankings = array();
        arsort($streamPositions);
        $rank = 1;
        $tie_rank = 0;
        $prev_score = -1;
        foreach($streamPositions as $mark_total => $score){
            if($score != $prev_score){
                //this score is not a tie
                $count = 0;
                $prev_score = $score;
                $streamRankings[$mark_total] = array('score' => $score,'rank'=>$rank);
            } else {
                //this is a tie
                $prev_score = $score;
                if($count++ == 0){
                    $tie_rank = $rank - 1;
                }
                $streamRankings[$mark_total] = array('score'=>$score,'rank'=>$tie_rank);
            }
            $rank++;
        }
        $streamRankings; 
        $strmPositions = collect($streamRankings); //End of Stream Ranking
        //Get Stream Position
        $streamPosition = streamPosition($streamRankings,$markName);
        
        $school = auth()->user()->school;
        $title = "Student Report Card";
        $downloadTitle = $school->name." "."-"." ".$name." ".$year->year." ".$term->name." "."Report Card";

        // Exam One Subject Grades
        $examOneMathsGrade = examOneMathsGrade($examOneMark,$markName);
        $examOneEnglishGrade = examOneEnglishGrade($examOneMark,$markName);
        $examOneKiswGrade = examOneKiswahiliGrade($examOneMark,$markName);
        $examOneChemGrade = examOneChemistryGrade($examOneMark,$markName);
        $examOneBioGrade = examOneBiologyGrade($examOneMark,$markName);
        $examOnePhysicsGrade = examOnePhysicsGrade($examOneMark,$markName);
        $examOneCREGrade = examOneCREGrade($examOneMark,$markName);
        $examOneIslamGrade = examOneIslamGrade($examOneMark,$markName);
        $examOneHistGrade = examOneHistoryGrade($examOneMark,$markName);
        $examOneGeogGrade = examOneGeogGrade($examOneMark,$markName);

        // Exam Two Subject Grades
        $examTwoMathsGrade = examTwoMathsGrade($examTwoMark,$markName);
        $examTwoEnglishGrade = examTwoEnglishGrade($examTwoMark,$markName);
        $examTwoKiswGrade = examTwoKiswahiliGrade($examTwoMark,$markName);
        $examTwoChemGrade = examTwoChemistryGrade($examTwoMark,$markName);
        $examTwoBioGrade = examTwoBiologyGrade($examTwoMark,$markName);
        $examTwoPhysicsGrade = examTwoPhysicsGrade($examTwoMark,$markName);
        $examTwoCREGrade = examTwoCREGrade($examTwoMark,$markName);
        $examTwoIslamGrade = examTwoIslamGrade($examTwoMark,$markName);
        $examTwoHistGrade = examTwoHistoryGrade($examTwoMark,$markName);
        $examTwoGeogGrade = examTwoGeogGrade($examTwoMark,$markName);

        // Exam Three Subject Grades
        $examThreeMathsGrade = examThreeMathsGrade($examThreeMark,$markName);
        $examThreeEnglishGrade = examThreeEnglishGrade($examThreeMark,$markName);
        $examThreeKiswGrade = examThreeKiswahiliGrade($examThreeMark,$markName);
        $examThreeChemGrade = examThreeChemistryGrade($examThreeMark,$markName);
        $examThreeBioGrade = examThreeBiologyGrade($examThreeMark,$markName);
        $examThreePhysicsGrade = examThreePhysicsGrade($examThreeMark,$markName);
        $examThreeCREGrade = examThreeCREGrade($examThreeMark,$markName);
        $examThreeIslamGrade = examThreeIslamGrade($examThreeMark,$markName);
        $examThreeHistGrade = examThreeHistoryGrade($examThreeMark,$markName);
        $examThreeGeogGrade = examThreeGeogGrade($examThreeMark,$markName);

        //Perform Cumulative Subjects Grade Points
        //Get Maths GPA 
        $examOneMathsGradePoints = examOneMathsGradePoints($examOneMark,$markName);
        $examTwoMathsGradePoints = examTwoMathsGradePoints($examTwoMark,$markName);
        $examThreeMathsGradePoints = examThreeMathsGradePoints($examThreeMark,$markName);
        $mathsCumulativePoints = Stat::mean([$examOneMathsGradePoints,$examTwoMathsGradePoints,$examThreeMathsGradePoints]);
        //Get English GPA 
        $examOneEnglishGradePoints = examOneEnglishGradePoints($examOneMark,$markName);
        $examTwoEnglishGradePoints = examTwoEnglishGradePoints($examTwoMark,$markName);
        $examThreeEnglishGradePoints = examThreeEnglishGradePoints($examThreeMark,$markName);
        $englishCumulativePoints = Stat::mean([$examOneEnglishGradePoints,$examTwoEnglishGradePoints,$examThreeEnglishGradePoints]);
        //Get Kiswahili GPA 
        $examOneKiswahiliGradePoints = examOneKiswahiliGradePoints($examOneMark,$markName);
        $examTwoKiswahiliGradePoints = examTwoKiswahiliGradePoints($examTwoMark,$markName);
        $examThreeKiswahiliGradePoints = examThreeKiswahiliGradePoints($examThreeMark,$markName);
        $kiswCumulativePoints = Stat::mean([$examOneKiswahiliGradePoints,$examTwoKiswahiliGradePoints,$examThreeKiswahiliGradePoints]);
        //Get Chemistry GPA 
        $examOneChemGradePoints = examOneChemistryGradePoints($examOneMark,$markName);
        $examTwoChemGradePoints = examTwoChemistryGradePoints($examTwoMark,$markName);
        $examThreeChemGradePoints = examThreeChemistryGradePoints($examThreeMark,$markName);
        $chemCumulativePoints = Stat::mean([$examOneChemGradePoints,$examTwoChemGradePoints,$examThreeChemGradePoints]);
        //Get Biology GPA 
        $examOneBioGradePoints = examOneBiologyGradePoints($examOneMark,$markName);
        $examTwoBioGradePoints = examTwoBiologyGradePoints($examTwoMark,$markName);
        $examThreeBioGradePoints = examThreeBiologyGradePoints($examThreeMark,$markName);
        $bioCumulativePoints = Stat::mean([$examOneBioGradePoints,$examTwoBioGradePoints,$examThreeBioGradePoints]);
        //Get Physics GPA 
        $examOnePhysicsGradePoints = examOnePhysicsGradePoints($examOneMark,$markName);
        $examTwoPhysicsGradePoints = examTwoPhysicsGradePoints($examTwoMark,$markName);
        $examThreePhysicsGradePoints = examThreePhysicsGradePoints($examThreeMark,$markName);
        $physicsCumulativePoints = Stat::mean([$examOnePhysicsGradePoints,$examTwoPhysicsGradePoints,$examThreePhysicsGradePoints]);
        //Get CRE GPA 
        $examOneCREGradePoints = examOneCREGradePoints($examOneMark,$markName);
        $examTwoCREGradePoints = examTwoCREGradePoints($examTwoMark,$markName);
        $examThreeCREGradePoints = examThreeCREGradePoints($examThreeMark,$markName);
        $creCumulativePoints = Stat::mean([$examOneCREGradePoints,$examTwoCREGradePoints,$examThreeCREGradePoints]);
        //Get Islam GPA 
        $examOneIslamGradePoints = examOneIslamGradePoints($examOneMark,$markName);
        $examTwoIslamGradePoints = examTwoIslamGradePoints($examTwoMark,$markName);
        $examThreeIslamGradePoints = examThreeIslamGradePoints($examThreeMark,$markName);
        $islamCumulativePoints = Stat::mean([$examOneIslamGradePoints,$examTwoIslamGradePoints,$examThreeIslamGradePoints]);
        //Get History GPA 
        $examOneHistGradePoints = examOneHistoryGradePoints($examOneMark,$markName);
        $examTwoHistGradePoints = examTwoHistoryGradePoints($examTwoMark,$markName);
        $examThreeHistGradePoints = examThreeHistoryGradePoints($examThreeMark,$markName);
        $histCumulativePoints = Stat::mean([$examOneHistGradePoints,$examTwoHistGradePoints,$examThreeHistGradePoints]);
        //Get GHC GPA 
        $examOneGeogGradePoints = examOneGeogGradePoints($examOneMark,$markName);
        $examTwoGeogGradePoints = examTwoGeogGradePoints($examTwoMark,$markName);
        $examThreeGeogGradePoints = examThreeGeogGradePoints($examThreeMark,$markName);
        $geogCumulativePoints = Stat::mean([$examOneGeogGradePoints,$examTwoGeogGradePoints,$examThreeGeogGradePoints]);

        $totalCumulativePoints = collect([$mathsCumulativePoints,$englishCumulativePoints,$kiswCumulativePoints,$chemCumulativePoints,$bioCumulativePoints,$physicsCumulativePoints,$creCumulativePoints,$islamCumulativePoints,$histCumulativePoints,$geogCumulativePoints])->sum();
        
        $cumulativePointsAvg = $totalCumulativePoints/5;
        
        //Overal GPA (Addition of all Cumulative Points Devide by Number of Units/Subjects Taken by the Student)
        $overalGPA = round($cumulativePointsAvg,1);

        //General Grade Each Exam
        $examOneGenGrade = examOneGeneralGrade($examOneMark,$examOne,$examOneTotal);
        $examTwoGenGrade = examTwoGeneralGrade($examTwoMark,$examTwo,$examTwoTotal);
        $examThreeGenGrade = examThreeGeneralGrade($examThreeMark,$examThree,$examThreeTotal);
        //General Report Card Remark
        $reportGeneralRemark = reportGeneralRemark($yearId,$termId,$stream,$year,$term,$overalTotalAvg);
        //Report Card Subject Average Grades
        $reportSubjectGrades = ReportSubjectGrade::with('class','year','term','subject')->where(['term_id'=>$termId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        //Report Card General Grades
        $reportMeanGrades = ReportMeanGrade::with('class','year','term')->where(['term_id'=>$termId,'class_id'=>$stream->class->id,'year_id'=>$yearId])->get();
        $streamStudents = $stream->students()->with('school','libraries','teachers','class','stream','clubs','payments','payment_records','marks','user')->get();

        $pdf = PDF::loadView('admin.pdf.threeexams_reportcard',compact('school','title','examOne','examTwo','examThree','examOneMark','examTwoMark','examThreeMark','mathsAvg','engAvg','kiswAvg','chemAvg','bioAvg','physicsAvg','creAvg','islamAvg','histAvg','geogAvg','year','term','overalTotalAvg','openingDate','closingDate','overalPosition','streamPosition','stream','examOneTotal','examTwoTotal','examThreeTotal','name','markName','examOneMathsGrade','examOneEnglishGrade','examOneKiswGrade','examOneChemGrade','examOneBioGrade','examOnePhysicsGrade','examOneCREGrade','examOneIslamGrade','examOneHistGrade','examOneGeogGrade','examTwoMathsGrade','examTwoEnglishGrade','examTwoKiswGrade','examTwoChemGrade','examTwoBioGrade','examTwoPhysicsGrade','examTwoCREGrade','examTwoIslamGrade','examTwoHistGrade','examTwoGeogGrade','examThreeMathsGrade','examThreeEnglishGrade','examThreeKiswGrade','examThreeChemGrade','examThreeBioGrade','examThreePhysicsGrade','examThreeCREGrade','examThreeIslamGrade','examThreeHistGrade','examThreeGeogGrade','examOneGenGrade','examTwoGenGrade','examThreeGenGrade','overalGPA','reportGeneralRemark','mark','streamStudents','reportSubjectGrades','reportMeanGrades','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/2);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf',array("Attachment" => 0));
    } 

    public function marks(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $classId = $request->class;

        $marks = Mark::with('exam.grades')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get();
        $studentMarks = collect($marks)->map(function($mark){
            $grade = Grade::where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId],function($query) use($mark){
                $query->where('from_mark','>=',$mark->mathematics);
                $query->where('to_mark','<=',$mark->mathematics);
            })->get();

            return [
                'grade'=>$grade,
            ];
        });
    }

    public function classMarkSheetPdfChart(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $classId = $request->class;
        $passMark = $request->pass_mark;
        $marks= classMarks($yearId,$termId,$examId,$classId);
        
        if(($yearId === null) || ($termId === null) || ($examId === null) || ($classId === null) || ($marks->isEmpty())){
            return back()->withErrors('Please ensure you have filled in the required details!');
        } 

        $school = auth()->user()->school;
        //Start of general subjects mean scores calculations
        $maths = $marks->pluck('mathematics','name');
        $english = $marks->pluck('english','name');
        $kiswahili = $marks->pluck('kiswahili','name');
        $chemistry = $marks->pluck('chemistry','name');
        $biology = $marks->pluck('biology','name');
        $physics = $marks->pluck('physics','name');
        $cre = $marks->pluck('cre','name');
        $islam = $marks->pluck('islam','name');
        $history = $marks->pluck('history','name');
        $geography = $marks->pluck('geography','name');
        //End of mean subjects mean score calculations
        $title = "BLAH BLAH";
        $downloadTitle = $school->name." ".$title;

        $render = view('admin.pdf.classmarksheet_pdfchart',compact('maths','english','kiswahili','chemistry','biology','physics','cre','islam','geography','history','downloadTitle'))->render();
        $pdf = new ChartPdf;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        $pdf->saveAs(public_path('storage/files/'.$title.".pdf"));
    
        return response()->download(public_path('storage/files/'.$downloadTitle.".pdf"));

    }
}
