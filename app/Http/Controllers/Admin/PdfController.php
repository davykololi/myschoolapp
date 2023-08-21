<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Auth;
use Illuminate\Support\Str;
use HiFolks\Statistics\Freq;
use App\Models\Club;
use App\Models\School;
use App\Models\Student;
use App\Models\Stream;
use App\Models\Department;
use App\Models\StreamSubjectTeacher;
use App\Models\ReportCard;
use App\Models\Letter;
use App\Models\MyClass;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Term;
use App\Models\Year;
use App\Models\ClassTotal;
use App\Models\StreamTotal;
use App\Models\Grade;
use App\Models\GeneralGrade;
use App\Models\ReportComment;
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
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
    }

    public function schoolStudents(School $school)
    {
        $students = $school->students()->with('stream','school','dormitory')->inRandomOrder()->get();
        $males = $school->males();
        $females = $school->females();
        $title = 'School Students List';
        $pdf = PDF::loadView('admin.pdf.school_students',compact('school','students','title','males','females'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function streamStudents(Stream $stream)
    {
        $streamStudents = $stream->students()->with('stream','school','dormitory')->inRandomOrder()->get();
        $title = $stream->name." ".'Students';
        $males = $stream->males();
        $females = $stream->females();
        $school = $stream->school;

        if($streamStudents->isEmpty()){
            return back()->with('error','This class has no students at the moment!');
        }

        $pdf = PDF::loadView('admin.pdf.stream_students',compact('stream','streamStudents','title','school','males','females'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function streamTeachers(Stream $stream)
    {
        $teachers = $stream->teachers;
        $streamTeachers = $stream->teachers;
        $title = $stream->name." ".'Teachers';
        $school = Auth::user()->school;

        if(empty($streamteachers)){
            return back()->withErrors('The teachers notyet assigned to this class!');
        }

        $pdf = PDF::loadView('admin.pdf.stream_teachers',compact('stream','teachers','streamSubjectTeachers','title','school'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function schoolClubs(School $school)
    {
        $clubs = $school->clubs()->with('school','teachers','staffs','students')->get();
        $title = $school->name." ".'Clubs';

        $pdf = PDF::loadView('admin.pdf.school_clubs',['school'=>$school,'clubs'=>$clubs,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function clubStudents(Club $club)
    {
        $clubStudents = $club->students;
        $school = $club->school;
        $title = $club->name." ".'Students';
        $pdf = PDF::loadView('admin.pdf.club_students',['club'=>$club,'school'=>$school,'clubStudents'=>$clubStudents,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function clubTeachers(Club $club)
    {
        $clubTeachers = $club->teachers;
        $school = $club->school;
        $title = $club->name." ".'Teachers';
        $pdf = PDF::loadView('admin.pdf.club_teachers',['club'=>$club,'school'=>$school,'clubTeachers'=>$clubTeachers,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function schoolDepts(School $school)
    {
        $schoolDepts = $school->departments;
        $title = $school->name." ".'Departments';
        $pdf = PDF::loadView('admin.pdf.departments',['school'=>$school,'schoolDepts'=>$schoolDepts,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function deptTeachers(Department $department)
    {
        if($department->teachers->isEmpty()){
            return back()->withErrors("Teachers notyet assigned to"." ".$department->name);
        }

        $deptTeachers = $department->teachers;
        $school = $department->school;
        $title = $department->name." ".'Teachers';
        $pdf = PDF::loadView('admin.pdf.department_teachers',['department'=>$department,'school'=>$school,'deptTeachers'=>$deptTeachers,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function letter(Letter $letter)
    {
        $school = $letter->school;
        $title = $school->name." ".'Letter';
        $pdf = PDF::loadView('admin.pdf.letters',['letter'=>$letter,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true,'isPhpEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $canvas->page_script('$pdf->set_opacity(.2, "Multiply");');
        $text = strtoupper('Original Copy');
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,$text,null,70, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function letterHead(School $school)
    {
        $title = $school->name." ".'Letter Head';
        $pdf = PDF::loadView('admin.pdf.letter_head',['school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper('Original Copy'),null,70, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function instantDownload(School $school,Request $request)
    {
        $content = $request->content;
        $title = $school->name;
        $pdf = PDF::loadView('admin.pdf.instant_download',['school'=>$school,'title'=>$title,'content'=>$content])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper('Original Copy'),null,70, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function schoolStaffs(School $school)
    {
        $subStaffs = $school->staffs;
        $title ='Subordinade Staffs';
        $pdf = PDF::loadView('admin.pdf.subordinade_staffs',['school'=>$school,'subStaffs'=>$subStaffs,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper('Subordinade Staffs'),null,50, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function streamFacilitators()
    {
        $user = auth()->user();
        $school = $user->school;
        $title = 'Stream Subjects Facilitators';
        $strmSubjectTeachers = $school->stream_subject_teachers()->inRandomOrder()->get();
        $pdf = PDF::loadView('admin.pdf.stream_facilitators',['school'=>$school,'title'=>$title,'strmSubjectTeachers'=>$strmSubjectTeachers])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'pdf',array("Attachment" => 0));
    }

    public function studentDetails(Student $student)
    {
        if($student->image === "image.png"){
            toastr()->error(ucwords('Please upload the student passport first!!!'));
            return back()->withErrors('Please upload the student passport first!!!');
        }
        
        $user = Auth::user();
        $school = $student->school;
        $title = 'Student Details';
        $vv = collect($student->stream->subjects()->pluck('name'));
        $streamSubjects = $vv->toArray();

        $pdf = PDF::loadView('admin.pdf.student_details',['student'=>$student,'school'=>$school,'title'=>$title,'streamSubjects'=>$streamSubjects])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,50, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'pdf',array("Attachment" => 0)); 
    }

    public function classMarkSheet(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $classId = $request->class;
        $passMark = $request->pass_mark;
        $marks= classMarks($yearId,$termId,$examId,$classId);

        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $class = MyClass::where('id',$classId)->first();
        $stream = Stream::where('class_id',$classId)->first();
        $school = auth()->user()->school;
        
        if(($yearId === null) || ($termId === null) || ($examId === null) || ($classId === null) || ($exam->year->id != $yearId) || ($exam->term->id != $termId) || ($examId != $exam->id) || ($marks->isEmpty())){
            return back()->withErrors('Please ensure you have filled in the required details!');
        } 

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
        $ghc = $marks->pluck('ghc','name');
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
        $classMinscore = $marks->avg('student_minscore');//Average of class minscore
        //Total Marks Frequencies
        $totalMarks = $marks->pluck('total','name');
        $x = $totalMarks->toArray();
        $totalMarksFrequencies = Statistics::make($x);

        // call the event
        event(new ExamRecords($yearId,$termId,$examId,$classId,$school,$marks));

        $pdf = PDF::loadView('admin.pdf.class_marksheet',compact('marks','examGrades','generalGrades','exam','class','school','year','term','title','rankings','passMark','totals','maths','english','kiswahili','chemistry','biology','physics','cre','islam','history','ghc','classMinscore','females','males','totalMarksFrequencies'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true,'isPhpEnabled'=>true])->setPaper('a3','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->page_script('$pdf->set_opacity(.2, "Multiply");');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download(Str::slug($title).'.pdf',array("Attachment" => 0));
    }

    public function streamMarkSheet(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $streamId = $request->stream;
        $passMark = $request->pass_mark;
        $marks = streamMarks($yearId,$termId,$examId,$streamId);

        $year = Year::where('id',$yearId)->firstOrFail();
        $term = Term::where('id',$termId)->firstOrFail();
        $exam = Exam::where('id',$examId)->firstOrFail();
        $stream = Stream::where('id',$streamId)->firstOrFail();
        $school = auth()->user()->school;

        if(($yearId === null) || ($termId === null) || ($examId === null) || ($streamId === null) || ($exam->year->id != $yearId) || ($exam->term->id != $termId) || ($examId != $exam->id) || ($marks->isEmpty())){
            return back()->withErrors('Please ensure you have filled in the required details!');
        } 

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
        $ghc = $marks->pluck('ghc','name');
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

        $title = $term->name." ".$stream->name." ".$exam->name." ".'Results';
        $pdf = PDF::loadView('admin.pdf.stream_marksheet',compact('marks','exam','stream','school','title','rankings','passMark','totals','maths','english','kiswahili','chemistry','biology','physics','cre','islam','history','ghc','streamStudents','males','females'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a3','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        return $pdf->download($title.'.pdf',array("Attachment" => 0));
    }

    public function studentReportCardForm()
    {
        $years = Year::all();
        $terms = Term::all();
        $classes = MyClass::all();
        $streams = Stream::all();
        $exams = Exam::all()->pluck('name','id');
        $terms = Term::all();
        $students = Student::with('school','libraries','teachers','class','stream','clubs')->get();

        return view('admin.pdf.report_card',compact('years','terms','classes','streams','exams','students'));
    }

    public function studentReportCard(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $streamId = $request->stream;
        $name = Str::lower($request->name);
        $closingDate = $request->closing_date;
        $openingDate = $request->opening_date;

        $examIds = $request->exams;
        if(is_null($examIds)){
            return back()->withErrors('Exam Ids Not Provided!');
        }
        
        $obtainedIds = Exam::whereIn('id',$examIds)->get();
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
        $ghcAvg = Stat::mean([$examOneMark->ghc,$examTwoMark->ghc,$examThreeMark->ghc]);
        

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
        $title = 'Student Report Card';

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
        $examOneGHCGrade = examOneGHCGrade($examOneMark,$markName);

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
        $examTwoGHCGrade = examTwoGHCGrade($examTwoMark,$markName);

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
        $examThreeGHCGrade = examThreeGHCGrade($examThreeMark,$markName);

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
        $examOneGHCGradePoints = examOneGHCGradePoints($examOneMark,$markName);
        $examTwoGHCGradePoints = examTwoGHCGradePoints($examTwoMark,$markName);
        $examThreeGHCGradePoints = examThreeGHCGradePoints($examThreeMark,$markName);
        $ghcCumulativePoints = Stat::mean([$examOneGHCGradePoints,$examTwoGHCGradePoints,$examThreeGHCGradePoints]);

        $totalCumulativePoints = collect([$mathsCumulativePoints,$englishCumulativePoints,$kiswCumulativePoints,$chemCumulativePoints,$bioCumulativePoints,$physicsCumulativePoints,$creCumulativePoints,$islamCumulativePoints,$histCumulativePoints,$ghcCumulativePoints])->sum();
        
        $cumulativePointsAvg = $totalCumulativePoints/5;
        
        //Overal GPA (Addition of all Cumulative Points Devide by Number of Units/Subjects Taken by the Student)
        $overalGPA = round($cumulativePointsAvg,1);

        //General Grade Each Exam
        $examOneGenGrade = examOneGeneralGrade($examOneMark,$examOne,$examOneTotal);
        $examTwoGenGrade = examTwoGeneralGrade($examTwoMark,$examTwo,$examTwoTotal);
        $examThreeGenGrade = examThreeGeneralGrade($examThreeMark,$examThree,$examThreeTotal);
        //General Report Card Comment
        $reportCardComment = reportCardComment($yearId,$termId,$stream,$year,$term,$overalTotalAvg);
        $streamStudents = $stream->students()->with('school','libraries','teachers','class','stream','clubs','payments','payment_records','marks')->get();

        $pdf = PDF::loadView('admin.pdf.student_reportcard',compact('school','title','examOne','examTwo','examThree','examOneMark','examTwoMark','examThreeMark','mathsAvg','engAvg','kiswAvg','chemAvg','bioAvg','physicsAvg','creAvg','islamAvg','histAvg','ghcAvg','year','term','overalTotalAvg','openingDate','closingDate','overalPosition','streamPosition','stream','examOneTotal','examTwoTotal','examThreeTotal','name','markName','examOneMathsGrade','examOneEnglishGrade','examOneKiswGrade','examOneChemGrade','examOneBioGrade','examOnePhysicsGrade','examOneCREGrade','examOneIslamGrade','examOneHistGrade','examOneGHCGrade','examTwoMathsGrade','examTwoEnglishGrade','examTwoKiswGrade','examTwoChemGrade','examTwoBioGrade','examTwoPhysicsGrade','examTwoCREGrade','examTwoIslamGrade','examTwoHistGrade','examTwoGHCGrade','examThreeMathsGrade','examThreeEnglishGrade','examThreeKiswGrade','examThreeChemGrade','examThreeBioGrade','examThreePhysicsGrade','examThreeCREGrade','examThreeIslamGrade','examThreeHistGrade','examThreeGHCGrade','examOneGenGrade','examTwoGenGrade','examThreeGenGrade','overalGPA','reportCardComment','mark','streamStudents'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');

        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $imageWidth = 250;
        $imageHeight = 250;
        $y = (($height-$imageHeight)/3);
        $x = (($width-$imageWidth)/2);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='normal');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf',array("Attachment" => 0));
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
}
