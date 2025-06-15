<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Stream;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamRegisterPdfController extends Controller
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
    
    public function streamRegister(Request $request)
    {
        $streamId = $request->stream_id;
        if(is_null($streamId)){
            return back()->withErrors('Ensure you select the stream name first before you proceed');
        }
        $stream = Stream::whereId($streamId)->firstOrFail();
        $streamStudents = $stream->students()->with('stream','school','user')->get();
        $school = Auth::user()->school;
        $title = $stream->name." ".'Register Form';
        $downloadTitle = $school->name." ".$title;
        $males = $stream->males();
        $females = $stream->females();

        if($streamStudents->isEmpty()){
            return back()->with('error','Students notyet assigned to'." ".$stream->name);
        }

        $pdf = PDF::loadView('admin.pdf.stream_register',compact('stream','streamStudents','title','school','males','females','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
