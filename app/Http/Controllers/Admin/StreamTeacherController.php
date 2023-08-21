<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Models\Stream;
use App\Models\StreamSubjectTeacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamTeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
    }
    
    public function streamTeacher(Teacher $teacher,Stream $stream)
    {

    	return view('admin.general.stream_teacher',compact('teacher','stream'));
    }
}
