<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentSurbodinatesPdfController extends Controller
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

    public function deptSubordinates(Request $request)
    {
        $deptId = $request->department_id;
        if(is_null($deptId)){
            return back()->withErrors('Select the department name before you proceed');
        }
        $department = Department::whereId($deptId)->firstOrFail();
        $deptSubordinates = $department->subordinates()->with('user')->get();
        if($deptSubordinates->isEmpty()){
            return back()->withErrors("Subordinate staffs notyet assigned to"." ".$department->name);
        }

        $school = Auth::user()->school;
        $title = $department->name." ".'Subordinate Staffs';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.department_subordinates',['department'=>$department,'school'=>$school,'deptSubordinates'=>$deptSubordinates,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','potrait');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
