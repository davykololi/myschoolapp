<?php

namespace App\Http\Controllers\Superadmin;

use PDF;
use Auth;
use App\Models\School;
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
        $this->middleware('auth:superadmin');
        $this->middleware('superadmin2fa');
    }

    public function schoolTeachers(School $school)
    {
        $schoolTeachers = $school->teachers()->with('school')->get();
        $title = 'School Teachers List';
        $pdf = PDF::loadView('superadmin.pdf.school_teachers',['school'=>$school,'schoolTeachers'=>$schoolTeachers,'title'=>$title])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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
        $canvas->image($imageUrl,$x,$y,$imageWidth,$imageHeight,$resolution='Multiply');
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,45, array(0,0,0),2,2,-30);
        
        return $pdf->download($title.'.pdf');
    } 
}
