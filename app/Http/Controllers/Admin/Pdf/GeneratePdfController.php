<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use Illuminate\Support\Str;
use App\Models\PdfGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneratePdfController extends Controller
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
    
    public function generatePdf(PdfGenerator $pdfGenerator)
    {
        $school = $pdfGenerator->school;
        $code = $data['code'] = strtoupper(Str::random(15));
        $title = $school->name." ".'Generated Pdf Document';
        $downloadTitle = $title." "."CODE: "." ".$code;
        $pdf = PDF::loadView('admin.pdf.pdf-generators',['pdfGenerator'=>$pdfGenerator,'school'=>$school,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true,'isPhpEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
