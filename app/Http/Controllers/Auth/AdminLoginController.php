<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Route;
use Exception;
use Mail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
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
        $this->middleware('guest:admin',['except' => ['logout']]);
    }

    public function showLoginForm()
    {
    	return view('admin.admin_login');
    }

    public function login(Request $request)
    {
    	//Validate the form data
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6',
    	]);

    	//Attempt to log the user in
    	if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],
    		$request->remember)){
    		//if credentials are true, then redirect to 2fa view to provide the generated code
            return redirect()->route('admin.2fa.index');
    	}

    	// if provided wrong credentials, then redirect back to the login with the form data
        return redirect("admin/login")->withErrors('Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
    	Auth::guard('admin')->logout();
    	return redirect('/');
    }
}
