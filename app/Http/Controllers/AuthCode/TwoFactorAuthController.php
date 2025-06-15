<?php

namespace App\Http\Controllers\AuthCode;

use Auth;
use Session;
use App\Models\UserEmailCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TwoFactorAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $title = "ENTER AND SUBMIT THE CODE";

        return view('two_factor_auth.2fa',compact('title'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function twoFAstore(Request $request)
    {
        $xx = strval("");
        $firstNumber = strval($request->first_number);
        $secondNumber = strval($request->second_number);
        $thirdNumber = strval($request->third_number);
        $fourthNumber = strval($request->fourth_number);
        $fifthNumber = strval($request->fifth_number);
        $sixthNumber = strval($request->sixth_number);

        $singleNumber = strval($xx.$firstNumber.$secondNumber.$thirdNumber.$fourthNumber.$fifthNumber.$sixthNumber);
        $code = $singleNumber;
  
        $find = UserEmailCode::where('user_id', auth()->user()->id)
                        ->where('code', $code)
                        ->where('updated_at', '>=', now()->subMinutes(1))
                        ->first();
  
        if (!is_null($find)) {
            Session::put('user_2fa', auth()->user()->id);

            $user = auth()->user();
            if($user->hasRole('superadmin')){
                return redirect()->route('superadmin.dashboard');
            }

            if($user->hasRole('admin')){
                return redirect()->route('admin.dashboard');
            }

            if($user->hasRole('teacher')){
                return redirect()->route('teacher.dashboard');
            }

            if($user->hasRole('accountant')){
                return redirect()->route('accountant.dashboard');
            }

            if($user->hasRole('student')){
                return redirect()->route('student.dashboard');
            }

            if($user->hasRole('librarian')){
                return redirect()->route('librarian.dashboard');
            }

            if($user->hasRole('matron')){
                return redirect()->route('matron.dashboard');
            }

            if($user->hasRole('parent')){
                return redirect()->route('parent.dashboard');
            }

            if($user->hasRole('subordinate')){
                return redirect()->route('subordinate.dashboard');
            }
        }

        flash()->error('You entered the wrong code.');
  
        return back()->withError('You entered the wrong code.');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function resend()
    {
        auth()->user()->generateCode();

        flash()->success('We re-sent code to your email.');
  
        return back()->with("success", 'We re-sent code to your email.');
    }
}
