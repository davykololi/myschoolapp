<?php
 
namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
 
class MatronLoginController extends Controller
{
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('guest:matron',['except' => ['logout']]);
    }
 
    //function to show admin login form
    public function showLoginForm() {
        return view('matron.matron_login');
    }
    //function to login admins
    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //attempt to login the admins in
        if (Auth::guard('matron')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //if credentials are true, then redirect to 2fa view to provide the generated code
            return redirect()->route('matron.2fa.index');
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('email','remember'))->withErrors('Oppes! You have entered invalid credentials');
    }
 
    public function logout()
    {
        Auth::guard('matron')->logout();
 
        return redirect('/');
    }
 
}
