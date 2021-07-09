<?php

namespace App\Http\Controllers\Staff;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    public function index()
    {
    	return view('staff');
    }

    public function assignments()
    {
        $user = Auth::user();

        return view('staff.assignments',['user'=>$user]);
    }
}
