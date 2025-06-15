<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Stream;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamStudentsPdfController extends Controller
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
    
    public function streamStudents(Request $request)
    {
        $streamId = $request->stream_id;
        if(is_null($streamId)){
            return back()->withErrors('Ensure you select the stream name first before you proceed');
        }
        $stream = Stream::whereId($streamId)->firstOrFail();
        $streamStudents = $stream->students()->with('stream','school','dormitory','user')->inRandomOrder()->get();
        
        if($streamStudents->isEmpty()){
            return back()->withErros('Students notyet assigned to'." ".$stream->name);
        }
        
        $school = Auth::user()->school;
        $title = $stream->name." ".'Students List';
        $date = date("l, F j, Y",strtotime(now()));
        $inquiries = ". More inquiries, contact"." ".Auth::user()->school->phone_no;
        $downloadTitle = $school->name." ".$title." : ".$date.$inquiries;
        $males = $stream->males();
        $females = $stream->females();

        $pdf = PDF::loadView('admin.pdf.stream_students',compact('stream','streamStudents','title','school','males','females','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
