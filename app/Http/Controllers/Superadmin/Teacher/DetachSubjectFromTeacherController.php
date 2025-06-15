<?php

namespace App\Http\Controllers\Superadmin\Teacher;

use App\Services\TeacherService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachSubjectFromTeacherController extends Controller
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
    public function detachSubjectFromTeacher(Request $request,$id)
    {
        $teacher = $this->teacherService->getId($id);
        $subjects = $request->subjects;
        if(empty($subjects)){
            return back()->withErrors('Please select atleast a subject or subjects before you proceed!');
        }
        $teacher->subjects()->detach($subjects);

        return back()->withSuccess('Done Successfully');
    }
}
