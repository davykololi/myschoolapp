<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Student;
use App\Models\Exam;
use DB;
use App\Charts\StudentsChart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function index(StudentsChart $chart)
    {
        $allStudents = Auth::user()->school->students()->count();
        $females = Auth::user()->school->students()->where('gender','Female')->count();
        $males = Auth::user()->school->students()->where('gender','Male')->count();

    	return view('admin.admin',['allStudents'=>$allStudents,'females'=>$females,'males'=>$males,'chart'=>$chart->build()]);
    }

    public function adminProfile()
    {
    	$admin = Auth::user();

    	return view('admin.profile.profile',compact('admin'));
    }
}
