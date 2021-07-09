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
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $pdf = PDF::loadView('admin.school.school_teachers',['school'=>$school,'schoolTeachers'=>$schoolTeachers,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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
        $pdf = PDF::loadView('admin.school.school_students',['school'=>$school,'students'=>$students,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $pdf = PDF::loadView('admin.stream.stream_students',['stream'=>$stream,'streamStudents'=>$streamStudents,'title'=>$title,'school'=>$school,])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
    	$pdf = PDF::loadView('admin.stream.stream_teachers',['stream'=>$stream,'teachers'=>$teachers,'title'=>$title,'streamSubjects'=>$streamSubjects])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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
        $pdf = PDF::loadView('admin.school.report_card',['report'=>$report,'school'=>$school,'title'=>$title,'user'=>$user])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $pdf = PDF::loadView('admin.school.school_clubs',['school'=>$school,'clubs'=>$clubs,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $pdf = PDF::loadView('admin.school.club_students',['club'=>$club,'school'=>$school,'clubStudents'=>$clubStudents,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $pdf = PDF::loadView('admin.school.club_teachers',['club'=>$club,'school'=>$school,'clubTeachers'=>$clubTeachers,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $pdf = PDF::loadView('admin.school.departments',['school'=>$school,'schoolDepts'=>$schoolDepts,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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
        $pdf = PDF::loadView('admin.school.department_teachers',['department'=>$department,'school'=>$school,'deptTeachers'=>$deptTeachers,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $pdf = PDF::loadView('admin.school.letters',['letter'=>$letter,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $pdf = PDF::loadView('admin.school.letter_head',['school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
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
        $title = $school->name." ".'Subordinade Staffs';
        $pdf = PDF::loadView('admin.school.subordinade_staffs',['school'=>$school,'subStaffs'=>$subStaffs,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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
        $title = 'Class Facilitators';
        $classSubjects = $school->standard_subjects()->inRandomOrder()->get();
        $pdf = PDF::loadView('admin.school.stream_facilitators',['school'=>$school,'title'=>$title,'classSubjects'=>$classSubjects])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,55, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'pdf',array("Attachment" => 0));
    }

    public function classMarkSheet(Request $request)
    {
        $yearId = $request->year;
        $termId = $request->term;
        $examId = $request->exam;
        $classId = $request->class;
        $marks = Mark::where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get();
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $class = MyClass::where('id',$classId)->first();
        $school = auth()->user()->school;
        $title = $year->year." ".$term->name." ".$class->name." ".$exam->name." ".'Results';
        $pdf = PDF::loadView('admin.school.class_marksheet',['marks'=>$marks,'exam'=>$exam,'class'=>$class,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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
        $marks = Mark::where(['term_id'=>$termId,'exam_id'=>$examId,'stream_id'=>$streamId,'year_id'=>$yearId])->get();
        $year = Year::where('id',$yearId)->first();
        $term = Term::where('id',$termId)->first();
        $exam = Exam::where('id',$examId)->first();
        $stream = Stream::where('id',$streamId)->first();
        $school = auth()->user()->school;
        $title = $year->year." ".$term->name." ".$stream->name." ".$exam->name." ".'Results';
        $pdf = PDF::loadView('admin.school.stream_marksheet',['marks'=>$marks,'exam'=>$exam,'stream'=>$stream,'school'=>$school,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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
}
