<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolStudentsPdfController extends Controller
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

    public function schoolStudents()
    {
        $school = Auth::user()->admin->school;
        $students = $school->students()->with('stream','school','dormitory','user')->inRandomOrder()->get();
        if($students->isEmpty()){
            toastr()->error(ucwords('This school has no students at the moment!'));
            return back();
        }
        $maleStudents = $school->male_students();
        $femaleStudents = $school->female_students();
        $title = 'Students List';
        $downloadTitle = $school->name." ".$title."-".date('Y');
        $pdf = PDF::loadView('admin.pdf.school_students',compact('school','students','title','maleStudents','femaleStudents','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
