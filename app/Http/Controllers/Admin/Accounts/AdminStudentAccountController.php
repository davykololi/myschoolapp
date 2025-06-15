<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Services\StudentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminStudentAccountController extends Controller
{
    protected $studentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
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
        
        return view('admin.accounts.students',compact('students'));
    }
}
