<?php

namespace App\Http\Controllers\Admin\Pdf;

use Auth;
use PDF;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentTeachersPdfController extends Controller
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

    public function deptTeachers(Request $request)
    {
        $deptId = $request->department_id;
        if(is_null($deptId)){
            return back()->withErrors('Select the department name before you proceed');
        }
        $department = Department::whereId($deptId)->firstOrFail();
        $deptTeachers = $department->teachers()->with('user')->get();
        if($deptTeachers->isEmpty()){
            return back()->withErrors("Teachers notyet assigned to"." ".$department->name);
        }

        $school = Auth::user()->school;
        $title = $department->name." ".'Teachers';
        $downloadTitle = $school->name." ".$title;
        $pdf = PDF::loadView('admin.pdf.department_teachers',['department'=>$department,'school'=>$school,'deptTeachers'=>$deptTeachers,'title'=>$title,'downloadTitle'=>$downloadTitle])->setOptions(['dpi'=>150,'defaultFont'=>'sans-serif','isRemoteEnabled' => true,'isHtml5ParserEnabled' => true])->setPaper('a4','landscape');
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2,"Multiply");
        $canvas->page_text($width/5, $height/2,strtoupper($title),null,30, array(0,0,0),2,2,-30);
        
        return $pdf->download($downloadTitle.'.pdf');
    }
}
