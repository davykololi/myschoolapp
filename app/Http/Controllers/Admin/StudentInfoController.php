<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentInfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('banned');
        $this->middleware('admin2fa');
    }

    public function studentInfo()
    {
        return view('admin.studentinfo.get_student_class_by_student_name',compact('schoolStudents'));
    }

    public function getStudentClass(Request $request)
    {
        $streamId = $request->stream;
        $name = $request->name;
        $admissionNumber = $request->admission_no;
        $student = Student::when($streamId,function($query,$streamId){
                    return $query->where('stream_id',$streamId);
                })->when($name,function($query,$name){
                    return $query->where('name','like',"%$name%");
                })->when($admissionNumber,function($query,$admissionNumber){
                    return $query->where('name','like',"%$admissionNumber%");
                })->firstOrFail();

        return $student;
    }
}
