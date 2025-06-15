<?php

namespace App\Http\Controllers\Superadmin\Pdf;

use PDF;
use Auth;
use App\Models\School;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperadminSchoolTeachersPdfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
    }

    public function schoolTeachers(School $school)
    {
        $schoolTeachers = $school->teachers()->with('user.teacher')->get();
        $title = 'Teachers List';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('superadmin.pdf.school_teachers',compact('school','schoolTeachers','title','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
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
        
        return $pdf->download($downloadTitle.'.pdf');
    } 
}
