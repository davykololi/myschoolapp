<?php

namespace App\Http\Controllers\Matron;

use App\Models\School;
use App\Models\Dormitory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatronController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:matron');
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

    public function dormitories(School $school)
    {
    	$dormitories = $school->dormitories()->with('school','students')->get();

        return view('matron.dormitories',compact('school','dormitories'));
    }

    public function dormitory(Dormitory $dormitory)
    {

        return view('matron.dormitory',compact('dormitory'));
    }
}
