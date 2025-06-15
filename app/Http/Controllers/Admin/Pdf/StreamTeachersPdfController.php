<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Stream;
use App\Models\StreamSubject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamTeachersPdfController extends Controller
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

    public function streamTeachers(Request $request)
    {
        $streamId = $request->stream_id;
        if(is_null($streamId)){
            return back()->withErrors('Ensure you select the stream first before you proceed!');
        }
        $stream = Stream::whereId($streamId)->firstOrFail();
        $streamSubjects = StreamSubject::where('stream_id',$streamId)->with('teacher.user','subject')->inRandomOrder()->get();
        if($streamSubjects->isEmpty()){
            return back()->withErrors('The teachers notyet assigned to'." ".$stream->name);
        }
        $school = Auth::user()->school;
        $title = $stream->name." ".'Teachers';
        $moreInquiries = ". For more inquiries, contact: ".Auth::user()->school->phone_no;
        $downloadTitle = $school->name." ".$title.$moreInquiries;

        $pdf = PDF::loadView('admin.pdf.stream_teachers',compact('stream','streamSubjects','title','school','downloadTitle'))->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,40, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
