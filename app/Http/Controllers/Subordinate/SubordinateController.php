<?php

namespace App\Http\Controllers\Subordinate;

use Auth;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubordinateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:subordinate');
        $this->middleware('subordinate-banned');
        $this->middleware('checktwofa');
    }

    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('subordinate')){
            return view('subordinate.subordinate');
        }
    }

    public function assignments()
    {
        $user = Auth::user();
        if($user->hasRole('subordinate')){
            return view('subordinate.assignments',compact('user'));
        }
    }

    public function instantDownloadForm()
    {
        $user = Auth::user();
        if($user->hasRole('subordinate')){
            return view('subordinate.instantdownload.instant_download',compact('user'));
        }
    }

    public function studentSearch(Request $request)
    {
        $user = Auth::user();
        if($user->hasRole('subordinate')){
            $studendId = $request->student_id;

            if(is_null($studendId)){
                return back()->withErrors('Please select the name first!');
            }
            $student = Student::where('id',$studendId)->first();

            return view('subordinate.search.student',compact('student'));
        }
    }
}
