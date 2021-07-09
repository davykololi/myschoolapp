<?php

namespace App\Http\Controllers\Parent;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:parent');
    }
    
    public function parentProfile()
    {
        $parent = Auth::user();

    	return view('parent.profile',compact('parent'));
    }
}
