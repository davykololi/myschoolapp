<?php

namespace App\Http\Controllers\Superadmin\Pdf;

use Auth;
use PDF;
use App\Models\Stream;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperadminStreamSubjectsPdfController extends Controller
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

    public function streamSubjects(Request $request)
    {
        $streamId = $request->stream_id;
        $stream = Stream::whereId($streamId)->firstOrFail();
        $streamSubjects = $stream->subjects()->inRandomOrder()->get();
        if($streamSubjects->isEmpty()){
            return back()->withErrors('The subjects notyet assigned to'." ".$stream->name." at the moment.");
        }
        $school = Auth::user()->school;
        $title = $stream->name." ".'Subjects';
        $moreInquiries = ". For more inquiries, contact: ".Auth::user()->school->phone_no;
        $downloadTitle = $school->name." ".$title.$moreInquiries;

        $pdf = PDF::loadView('superadmin.pdf.stream_subjects',compact('stream','streamSubjects','title','school','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','portrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
