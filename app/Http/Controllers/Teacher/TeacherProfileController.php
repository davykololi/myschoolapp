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
        $this->middleware('auth');
        $this->middleware('role:teacher');
        $this->middleware('teacher-banned');
        $this->middleware('checktwofa');
    }
    
    public function teacherProfile()
    {
        $user = Auth::user();
        $teacherStreamSubjects = $user->teacher->stream_subjects()->with('subject','stream')->get();

    	return view('teacher.profile',compact('user','teacherStreamSubjects'));
    }
}
