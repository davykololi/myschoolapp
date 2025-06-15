<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolParentsPdfController extends Controller
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
}
