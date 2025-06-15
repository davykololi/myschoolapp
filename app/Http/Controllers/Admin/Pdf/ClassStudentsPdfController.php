<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\MyClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassStudentsPdfController extends Controller
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
    
    public function classStudents(Request $request)
    {
        $classId = $request->class_id;
        if(is_null($classId)){
            return back()->withErrors('Ensure you select class name first before you proceed');
        }
        $class = MyClass::whereId($classId)->firstOrFail();
        $classStudents = $class->students()->with('stream.stream_section','school','dormitory','user')->inRandomOrder()->get();

        if($classStudents->isEmpty()){
            return back()->withErrors('This class has no students at the moment!');
        }

        $school = Auth::user()->school;
        $title = $class->name." ".'Students List';
        $downloadTitle = $school->name." ".$title;
        $males = $class->males();
        $females = $class->females();

        $pdf = PDF::loadView('admin.pdf.class_students',compact('class','classStudents','title','school','males','females','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
