<?php

namespace App\Http\Controllers\Matron;

use Auth;
use App\Services\SchoolService;
use App\Services\DormitoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatronController extends Controller
{
    protected $schService,$dormService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchoolService $schService,DormitoryService $dormService)
    {
        $this->middleware('auth:matron');
        $this->middleware('banned');
        $this->middleware('matron2fa');
        $this->schService = $schService;
        $this->dormService = $dormService;
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matron.matron');
    }

    public function dormitories()
    {
        $school = Auth::user()->school;
    	$dormitories = $school->dormitories()->with('school','students')->get();

        return view('matron.dormitories',compact('school','dormitories'));
    }

    public function dormitory($id)
    {
        $dormitory = $this->dormService->getId($id);
        $dormitoryStudents = $dormitory->students()->with('stream')->get();

        return view('matron.dormitory',compact('dormitory','dormitoryStudents'));
    }

    public function dormitoryQueries()
    {
        $dormitories = $this->dormService->all();

        return view('matron.dormitories.dormitory_queries',compact('dormitories'));
    }
}
