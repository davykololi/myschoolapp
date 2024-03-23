<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
    }

    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('superadmin')){
           return view('superadmin.superadmin'); 
        }
    }
}
