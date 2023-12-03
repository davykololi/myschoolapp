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
        $this->middleware('banned');
    }
    
    public function parentProfile()
    {
        $parent = Auth::user();
        $parentStudents = $parent->students()->with('school','libraries','teachers','class','stream','clubs','payments','payment_records')->get();

    	return view('parent.profile',compact('parent','parentStudents'));
    }
}
