<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:teacher',['except' => ['logout']]);
    }

    public function showLoginForm()
    {
    	return view('teacher.teacher_login');
    }

    public function login(Request $request)
    {
    	//Validate the form data
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6',
    	]);

    	//Attempt to log the user in
    	if(Auth::guard('teacher')->attempt(['email'=>$request->email,'password'=>$request->password],
    		$request->remember)){
    		//if successful, then redirect to their intended location
    		return redirect()->intended(route('teacher.dashboard'));
    	}
    	// if unsuccessfull, then redirect back to the login with the form data
    	return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
    	Auth::guard('teacher')->logout();
    	return redirect('/');
    }
}
