<?php

namespace App\Http\Controllers\Matron;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Matron;
use RoyceLtd\LaravelBulkSMS\Facades\RoyceBulkSMS;
use Illuminate\Validation\Rules\Password;

class MatronChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:matron');
        $this->middleware('matron2fa');
    }

    /**
     * Show the teacher change password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matron.change_password');
    }

    public function store(Request $request)
    {
    	$request->validate([
    				'current_password' => ['required', new MatchOldPassword],
    				'new_password' => ['required',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
    				'new_confirm_password' => ['same:new_password'],
    			]);

  			Matron::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

  		//Logout prompt to log in again using new password
        Auth::guard('matron')->logout();

        //Send SMS/Mail to Auth User Notifying him/her that he/she changed the password
        $phone_number = Auth::user()->phone_no;
        $message = 'You changed password successfully. If done by someone else, inform the admin on 0724351952 for assistance. Do not share your password with anyone. Always ensure your accounr is logged out after using. Thank you.';
        RoyceBulkSMS::sendSMS($phone_number, $message);

        return redirect('/matron/login') ->withSuccess('The password changed successfuly!. Now login using new password');
    }
}
