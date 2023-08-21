<?php

namespace App\Http\Controllers\Student;

use Auth;
use Session;
use App\Models\UserEmailCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentTwoFAController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:student');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        //Generate 2FA CODE
        $generatedCode= auth()->user()->generateCode();

        return view('student.2fa');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function twoFAstore(Request $request)
    {
        $request->validate([
            'code'=>'required',
        ]);
  
        $find = UserEmailCode::where('student_id', auth()->user()->id)
                        ->where('code', $request->code)
                        ->where('updated_at', '>=', now()->subMinutes(1))
                        ->first();
  
        if (!is_null($find)) {
            Session::put('user_2fa', auth()->user()->id);

            return redirect()->intended(route('student.dashboard'));
        }
  
        return back()->withErrors('You entered wrong code.');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resend()
    {
        auth()->user()->generateCode();
  
        return back()->withSuccess('We re-sent code to on your email.');
    }
}
