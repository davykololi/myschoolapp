<?php

namespace App\Http\Controllers\Accountant;

use Auth;
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
        $this->middleware('auth');
        $this->middleware('role:accountant');
        $this->middleware('accountant-banned');
        $this->middleware('checktwofa');
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
        $user = Auth::user();
        if($user->hasRole('accountant')){
            return view('accountant.accountant');
        } 
    }

    public function feeBalance(Request $request)
    {
        $user = Auth::user();
        if($user->hasRole('accountant')){
            $students = $this->studentService->all();
            $classes = $this->classService->all();
            $streams = $this->streamService->all();

            return view('accountant.queries.payment_queries',compact('students','classes','streams'));
        }
    }
}
