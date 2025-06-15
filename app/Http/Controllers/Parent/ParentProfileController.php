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
        $this->middleware('auth');
        $this->middleware('role:parent');
        $this->middleware('parent-banned');
        $this->middleware('checktwofa');
    }
    
    public function parentProfile()
    {
        $user = Auth::user();
        $parentChildren = $user->parent->children()->with('school','libraries','teachers','stream','clubs','payments','payment_records','user')->get();

    	return view('parent.profile',compact('user','parentChildren'));
    }
}
