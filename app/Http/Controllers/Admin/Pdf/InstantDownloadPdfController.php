<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\School;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstantDownloadPdfController extends Controller
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

    public function instantDownload(School $school,Request $request)
    {
        $content = $request->content;
        $title = $school->name;
        $downloadTitle = $title;
        $pdf = PDF::loadView('admin.pdf.instant_download',['school'=>$school,'title'=>$title,'content'=>$content,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
