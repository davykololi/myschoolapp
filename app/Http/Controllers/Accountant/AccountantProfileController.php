<?php

namespace App\Http\Controllers\Accountant;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountantProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:accountant');
    }
    
    public function accountantProfile()
    {
        $accountant = Auth::user();

    	return view('accountant.profile',compact('accountant'));
    }
}
