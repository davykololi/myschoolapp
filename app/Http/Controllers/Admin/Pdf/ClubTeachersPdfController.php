<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Club;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClubTeachersPdfController extends Controller
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

    public function clubTeachers(Request $request)
    {
        $clubId = $request->club_id;
        if(is_null($clubId)){
            return back()->withErrors('Ensure you select a club first before you proceed');
        }
        $club = Club::whereId($clubId)->firstOrFail();
        $clubTeachers = $club->teachers()->with('clubs','user')->get();

        if($clubTeachers->isEmpty()){
            return back()->withErrors('The teachers notyet assigned to this club!');
        }
        
        $school = $club->school;
        $title = $club->name." ".'Teachers';
        $downloadTitle = $school->name." ".$title;

        $pdf = PDF::loadView('admin.pdf.club_teachers',['club'=>$club,'school'=>$school,'clubTeachers'=>$clubTeachers,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $imageUrl = public_path('/storage/storage/'.$school->image);
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,35, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
