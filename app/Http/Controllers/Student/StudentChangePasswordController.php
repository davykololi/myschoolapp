<?php

namespace App\Http\Controllers\Student;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use Illuminate\Validation\Rules\Password;

class StudentChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
        $this->middleware('banned');
        $this->middleware('student2fa');
    }

    /**
     * Show the teacher change password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.change_password');
    }

    public function store(Request $request)
    {
    	$request->validate([
    				'current_password' => ['required', new MatchOldPassword],
    				'new_password' => ['required',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
    				'new_confirm_password' => ['same:new_password'],
    			]);

  			Student::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

            //Logout prompt to log in again using new password
            Auth::guard('student')->logout();

            //Send SMS/Mail to Auth User Notifying him/her that he/she changed the password

  		return redirect('/student/login') ->withSuccess('The password changed successfuly!. Now login using new password');
    }
}
