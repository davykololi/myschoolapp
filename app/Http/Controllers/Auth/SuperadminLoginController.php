<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperadminLoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:superadmin',['except' => ['logout']]);
    }

    public function showLoginForm()
    {
    	return view('superadmin.superadmin_login');
    }

    public function login(Request $request)
    {
    	//Validate the form data
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6',
    	]);

    	//Attempt to log the user in
    	if(Auth::guard('superadmin')->attempt(['email'=>$request->email,'password'=>$request->password],
    		$request->remember)){
    		//if credentials are true, then redirect to 2fa view to provide the generated code
            return redirect()->route('superadmin.2fa.index');
    	}
    	// if unsuccessfull, then redirect back to the login with the form data
    	return redirect()->back()->withInput($request->only('email','remember'))->withErrors('Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
    	Auth::guard('superadmin')->logout();
    	return redirect('/');
    }
}
