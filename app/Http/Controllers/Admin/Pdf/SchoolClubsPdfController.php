<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolClubsPdfController extends Controller
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
}
