<?php

namespace App\Http\Controllers\Superadmin\Pdf;

use Auth;
use PDF;
use App\Models\Stream;
use App\Models\StreamSubject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperadminStreamTeachersPdfController extends Controller
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

    public function streamTeachers(Request $request)
    {
        $streamId = $request->stream_id;
        if(is_null($streamId)){
            return back()->withErrors('Ensure you select the stream first before you proceed!');
        }
        $stream = Stream::whereId($streamId)->firstOrFail();
        $streamTeachers = $stream->teachers()->with('user')->inRandomOrder()->get();
        if($streamTeachers->isEmpty()){
            return back()->withErrors('The teachers notyet assigned to'." ".$stream->name);
        }
        $school = Auth::user()->school;
        $title = $stream->name." ".'Teachers';
        $moreInquiries = ". For more inquiries, contact: ".Auth::user()->school->phone_no;
        $downloadTitle = $school->name." ".$title.$moreInquiries;

        $pdf = PDF::loadView('superadmin.pdf.stream_teachers',compact('stream','streamTeachers','title','school','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','portrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
