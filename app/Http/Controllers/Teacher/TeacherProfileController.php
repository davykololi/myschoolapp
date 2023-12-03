<?php

namespace App\Http\Controllers\Teacher;

use Auth;
use App\Models\Teacher;
use App\Models\StreamSubjectTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
        $this->middleware('teacher2fa');
    }
    
    public function teacherProfile()
    {
        $teacher = Auth::user();

    	return view('teacher.profile',['teacher'=>$teacher]);
    }
}
