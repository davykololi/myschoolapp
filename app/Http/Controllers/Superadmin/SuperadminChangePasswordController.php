<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Superadmin;
use RoyceLtd\LaravelBulkSMS\Facades\RoyceBulkSMS;
use Illuminate\Validation\Rules\Password;

class SuperadminChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
        $this->middleware('superadmin2fa');
    }

    /**
     * Show the teacher change password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.change_password');
    }

    public function store(Request $request)
    {
    	$request->validate([
    				'current_password' => ['required', new MatchOldPassword],
    				'new_password' => ['required',Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
    				'new_confirm_password' => ['same:new_password'],
    			]);

  			Superadmin::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

  		//Logout prompt to log in again using new password
        Auth::guard('superadmin')->logout();

        //Send SMS/Mail to Auth User Notifying him/her that he/she changed the password
        $phone_number = Auth::user()->phone_no;
        $message = 'You changed password successfully. If done by someone else, inform the admin on 0724351952 for assistance. Do not share your password with anyone. Always ensure your accounr is logged out after using. Thank you.';
        RoyceBulkSMS::sendSMS($phone_number, $message);

        return redirect('/superadmin/login') ->withSuccess('The password changed successfuly!. Now login using new password');
    }
}
