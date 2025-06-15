<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolSurbodinatesPdfController extends Controller
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

    public function schoolSubordinates()
    {
        $school = Auth::user()->school;
        $schoolSubStaffs = $school->subordinates()->with('school','user')->inRandomOrder()->get();
        if($schoolSubStaffs->isEmpty()){
            toastr()->error(ucwords('This school has no sub staffs at the moment!'));
            return back();
        }
        $title ='Subordinate Staffs';
        $schoolDomain = env('APP_URL');
        $downloadTitle = $school->name." ".$title." ".$schoolDomain;
        $pdf = PDF::loadView('admin.pdf.subordinade_staffs',['school'=>$school,'schoolSubStaffs'=>$schoolSubStaffs,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper('Subordinate Staffs'),null,50, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
