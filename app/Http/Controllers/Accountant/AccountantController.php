<?php

namespace App\Http\Controllers\Accountant;

use App\Models\Student;
use App\Models\Stream;
use App\Services\StudentService;
use App\Services\ClassService;
use App\Services\StreamService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    protected $studentService,$classService,$streamService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService,ClassService $classService,StreamService $streamService)
    {
        $this->middleware('auth:accountant');
        $this->middleware('banned');
        $this->middleware('accountant2fa');
        $this->studentService = $studentService;
        $this->classService = $classService;
        $this->streamService = $streamService;
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accountant.accountant');
    }

    public function feeBalance(Request $request)
    {
        $students = $this->studentService->all();
        $classes = $this->classService->all();
        $streams = $this->streamService->all();

        return view('accountant.queries.fee_balance',compact('students','classes','streams'));
    }
}
