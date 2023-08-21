<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Route;
use Exception;
use Mail;
use App\Models\UserEmailCode;
use App\Mail\SendEmailCode;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
  
    use AuthenticatesUsers;

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
    		//if credentials are true, then redirect to 2fa view to provide the generated code
    		return redirect()->route('teacher.2fa.index');
    	}
    	// if provided wrong credentials, then redirect back to the login with the form data
    	return redirect("teacher/login")->withErrors('Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
    	Auth::guard('teacher')->logout();
    	return redirect('/');
    }
}
