<?php

namespace App\Http\Controllers\Admin\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolMeetingsPdfController extends Controller
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

    public function schoolMeetings()
    {
        $school = Auth::user()->school;
        $schoolMeetings = $school->meetings()->with('school','teachers','subordinates','students')->get();
        if($schoolMeetings->isEmpty()){
            return back()->withErrors($school->name." "."has no meetings at the moment!");
        }
        $title = " List";
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
}
