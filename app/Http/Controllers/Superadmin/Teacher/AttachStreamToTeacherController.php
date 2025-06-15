<?php

namespace App\Http\Controllers\Superadmin\Teacher;

use App\Services\TeacherService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStreamToTeacherController extends Controller
{
    protected $teacherService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TeacherService $teacherService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->teacherService = $teacherService;
    }
    public function attachStreamToTeacher(Request $request,$id)
    {
    	$teacher = $this->teacherService->getId($id);
    	$streams = $request->streams;
        if(empty($streams)){
            return back()->withErrors('Please select atleast a stream or streams before you proceed!');
        }
    	$teacher->streams()->syncWithoutDetaching($streams);

    	return back()->withSuccess('Done Successfully');
    }
}
