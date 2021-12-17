<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Auth;
use App\Models\Club;
use App\Models\School;
use App\Models\Student;
use App\Models\Stream;
use App\Models\Department;
use App\Models\StandardSubject;
use App\Models\ReportCard;
use App\Models\Letter;
use App\Models\MyClass;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Term;
use App\Models\Year;
use App\Models\ClassTotal;
use App\Models\StreamTotal;
use App\Charts\MarksChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PdfController extends Controller
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

    public function schoolTeachers(School $school)
    {
        $schoolTeachers = $school->teachers()->with('school','position_teacher')->get();
        $title = $school->name." ".'Teachers';
        $pdf = PDF::loadView('admin.pdf.school_teachers',['school'=>$school,'schoolTeachers'=>$schoolTeachers,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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

    public function schoolStudents(School $school)
    {
        $students = $school->students()->with('stream','school','dormitory')->get();
        $title = $school->name." ".'Students';
        $pdf = PDF::loadView('admin.pdf.school_students',['school'=>$school,'students'=>$students,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    }

    public function streamStudents(Stream $stream)
    {
        $streamStudents = $stream->students;
        $title = $stream->name." ".'Students';
        $school = $stream->school;
        $pdf = PDF::loadView('admin.pdf.stream_students',['stream'=>$stream,'streamStudents'=>$streamStudents,'title'=>$title,'school'=>$school,])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $streamSubjects = $stream->standard_subjects;
        $title = $stream->name." ".'Teachers';
        $school = $stream->school;
        $pdf = PDF::loadView('admin.pdf.stream_teachers',['stream'=>$stream,'teachers'=>$teachers,'title'=>$title,'streamSubjects'=>$streamSubjects])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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

    public function reportCard(ReportCard $report)
    {
        $user = Auth::user();
        $school = $user->school;
        $title = $report->name." ".'Report Card';
        $pdf = PDF::loadView('admin.pdf.initialReport_card',['report'=>$report,'school'=>$school,'title'=>$title,'user'=>$user])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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

    public function schoolClubs(School $school)
    {
        $clubs = $school->clubs()->with('school','teachers','staffs','students')->get();
        $title = $school->name." ".'Clubs';
        $pdf = PDF::loadView('admin.pdf.school_clubs',['school'=>$school,'clubs'=>$clubs,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $pdf = PDF::loadView('admin.pdf.letters',['letter'=>$letter,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $classSubjects = $school->standard_subjects()->inRandomOrder()->get();
        $pdf = PDF::loadView('admin.pdf.stream_facilitators',['school'=>$school,'title'=>$title,'classSubjects'=>$classSubjects])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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

    public function classMarkSheet(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $classId = $request->class;
        $passMark = $request->pass_mark;
        $marks = Mark::where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get()->sortByDesc('total');

        //Start of general subjects mean scores calculations
        $maths = $marks->pluck('mathematics','name');
        $english = $marks->pluck('english','name');
        $kiswahili = $marks->pluck('kiswahili','name');
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
        
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $class = MyClass::where('id',$classId)->first();
        $school = auth()->user()->school;
        $title = $year->year." ".$term->name." ".$class->name." ".$exam->name." ".'Results';

        $pdf = PDF::loadView('admin.pdf.class_marksheet',compact('marks','exam','class','school','title','rankings','passMark','totals','maths','english','kiswahili'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a3','landscape');
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
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf',array("Attachment" => 0));
    }

    public function streamMarkSheet(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $streamId = $request->stream;
        $passMark = $request->pass_mark;
        $marks = Mark::where(['term_id'=>$termId,'exam_id'=>$examId,'stream_id'=>$streamId,'year_id'=>$yearId])->get()->sortByDesc('total');

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
        $streamStudents = $stream->students;

        $title = $year->year." ".$term->name." ".$stream->name." ".$exam->name." ".'Results';
        $pdf = PDF::loadView('admin.pdf.stream_marksheet',compact('marks','exam','stream','school','title','rankings','passMark','totals','maths','english','kiswahili','chemistry','biology','physics','cre','islam','history','ghc','streamStudents'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a3','landscape');
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
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,25, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf',array("Attachment" => 0));
    }

    public function studentReportCardForm()
    {
        $years = Year::all();
        $terms = Term::all();
        $classes = MyClass::all();
        $streams = Stream::all();
        $exams = Exam::all();
        $terms = Term::all();

        return view('admin.pdf.report_card',compact('years','terms','classes','streams','exams'));
    }

    public function studentReportCard(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $classId = $request->class;
        $streamId = $request->stream;
        $name = $request->name;
        $closingDate = $request->closing_date;
        $openingDate = $request->opening_date;
        $examOneId = $request->exam_one;
        $examTwoId = $request->exam_two;
        $examThreeId = $request->exam_three;
        $class = MyClass::where('id',$classId)->first();
        $term = Term::where('id',$termId)->first();
        $year = Year::where('id',$yearId)->first();
        $stream = Stream::where(['id'=>$streamId,'class_id'=>$classId])->first();
        $student = Student::where('name',$name)->first();

        $mark = Mark::when($yearId,function($query,$yearId){
            return $query->where('year_id',$yearId);
        })->when($termId,function($query,$termId){
            return $query->where('term_id',$termId);
        })->when($classId,function($query,$classId){
            return $query->where('class_id',$classId);
        })->when($streamId,function($query,$streamId){
            return $query->where('stream_id',$streamId);
        })->when($name,function($query,$name){
            return $query->where('name','like',"%$name%");
        })->firstOrFail();

        $examOneMark = Mark::where(['name'=>$name,'class_id'=>$classId,'stream_id'=>$stream->id,'exam_id'=>$examOneId])->first();
        $examTwoMark = Mark::where(['name'=>$name,'class_id'=>$classId,'stream_id'=>$stream->id,'exam_id'=>$examTwoId])->first();
        $examThreeMark = Mark::where(['name'=>$name,'class_id'=>$classId,'stream_id'=>$stream->id,'exam_id'=>$examThreeId])->first();

        $maths = collect([$examOneMark->mathematics,$examTwoMark->mathematics,$examThreeMark->mathematics]);
        $mathsAvg = $maths->avg();
        $eng = collect([$examOneMark->english,$examTwoMark->english,$examThreeMark->english]);
        $engAvg = $eng->avg();
        $kisw = collect([$examOneMark->kiswahili,$examTwoMark->kiswahili,$examThreeMark->kiswahili]);
        $kiswAvg = $kisw->avg();
        $chem = collect([$examOneMark->chemistry,$examTwoMark->chemistry,$examThreeMark->chemistry]);
        $chemAvg = $chem->avg();
        $bio = collect([$examOneMark->biology,$examTwoMark->biology,$examThreeMark->biology]);
        $bioAvg = $bio->avg();
        $physics = collect([$examOneMark->physics,$examTwoMark->physics,$examThreeMark->physics]);
        $physicsAvg = $physics->avg();
        $cre = collect([$examOneMark->cre,$examTwoMark->cre,$examThreeMark->cre]);
        $creAvg = $cre->avg();
        $islam = collect([$examOneMark->islam,$examTwoMark->islam,$examThreeMark->islam]);
        $islamAvg = $islam->avg();
        $hist = collect([$examOneMark->history,$examTwoMark->history,$examThreeMark->history]);
        $histAvg = $hist->avg();
        $ghc = collect([$examOneMark->ghc,$examTwoMark->ghc,$examThreeMark->ghc]);
        $ghcAvg = $ghc->avg();

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
        $clasPositions = collect($classRankings);
        //End of Overal Class Ranking

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
        $strmPositions = collect($streamRankings);
        //End of Stream Ranking

        $school = auth()->user()->school;
        $title = 'Student Report Card';
        $pdf = PDF::loadView('admin.pdf.student_reportcard',compact('mark','school','title','examOneMark','examTwoMark','examThreeMark','mathsAvg','engAvg','kiswAvg','chemAvg','bioAvg','physicsAvg','creAvg','islamAvg','histAvg','ghcAvg','class','year','term','overalTotalAvg','openingDate','closingDate','classRankings','streamRankings','clasPositions','strmPositions','stream','student','examOneTotal','examTwoTotal','examThreeTotal'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
}
