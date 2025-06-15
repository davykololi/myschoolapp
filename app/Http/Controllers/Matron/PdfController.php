<?php

namespace App\Http\Controllers\Matron;

use Auth;
use PDF;
use App\Models\Dormitory;
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
        $this->middleware('auth');
        $this->middleware('role:matron');
        $this->middleware('matron-banned');
        $this->middleware('checktwofa');
    }

    public function dormitoryStudents(Request $request)
    {
        $dormitoryId = $request->dormitory_id;
        $dormitory = Dormitory::whereId($dormitoryId)->firstOrFail();
        $dormitoryStudents = $dormitory->students()->with('stream','school','user','dormitory','bed_number')->inRandomOrder()->get();
        $school = Auth::user()->school;
        $title = $dormitory->name." ".'Dormitory Students';
        $moreInfo = ". For more inquiries, contact us via ".Auth::user()->school->phone_no;
        $downloadTitle = $school->name." ".$title.$moreInfo;

        if($dormitoryStudents->isEmpty()){
            return back()->with('error','This dormitory has no students at the moment!');
        }

        $pdf = PDF::loadView('matron.pdf.dormitory_students',compact('dormitory','dormitoryStudents','title','school','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
