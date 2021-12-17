<?php

namespace App\Http\Controllers\Matron;

use App\Repositories\SchoolRepository as SchRepo;
use App\Repositories\DormitoryRepository as DormRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatronController extends Controller
{
    protected $schRepo,$dormRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SchRepo $schRepo,DormRepo $dormRepo)
    {
        $this->middleware('auth:matron');
        $this->schRepo = $schRepo;
        $this->dormRepo = $dormRepo;
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matron');
    }

    public function dormitories($id)
    {
        $school = $this->schRepo->getId($id);
    	$dormitories = $school->dormitories()->with('school','students')->get();

        return view('matron.dormitories',compact('school','dormitories'));
    }

    public function dormitory($id)
    {
        $dormitory = $this->dormRepo->getId($id);

        return view('matron.dormitory',compact('dormitory'));
    }
}
