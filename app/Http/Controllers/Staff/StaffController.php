<?php

namespace App\Http\Controllers\Staff;

use Auth;
use App\Models\Student;
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
        $this->middleware('staff2fa');
    }

    public function index()
    {
    	return view('staff.staff');
    }

    public function assignments()
    {
        $user = Auth::user();

        return view('staff.assignments',['user'=>$user]);
    }

    public function instantDownloadForm()
    {
        $user = Auth::user();

        return view('staff.instantdownload.instant_download',['user'=>$user]);
    }

    public function studentSearch(Request $request)
    {
        $studendId = $request->student;

        if(is_null($studendId)){
            return back()->withErrors('Please select the name first!');
        }
        $student = Student::where('id',$studendId)->first();

        return view('staff.search.student',compact('student'));
    }
}
