<?php
 
namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
 
class AccountantLoginController extends Controller
{
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('guest:accountant',['except' => ['logout']]);
    }
 
    //function to show admin login form
    public function showLoginForm() {
        return view('accountant.accountant_login');
    }
    //function to login admins
    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //attempt to login the admins in
        if (Auth::guard('accountant')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //if successful redirect to admin dashboard
            return redirect()->intended(route('accountant.dashboard'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }
 
    public function logout()
    {
        Auth::guard('accountant')->logout();
 
        return redirect('/');
    }
 
}
