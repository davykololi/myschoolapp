<?php

namespace App\Http\Controllers\Admin;

use Auth;
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
    }

    public function index()
    {
    	return view('admin');
    }

    public function adminProfile()
    {
    	$admin = Auth::user();

    	return view('admin.profile.profile',compact('admin'));
    }
}
