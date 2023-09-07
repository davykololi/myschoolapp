<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
        $this->studentService = $studentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function students()
    {
        //
        $students = $this->studentService->paginate();
        
        return view('superadmin.students.students',compact('students'));
    }
}
