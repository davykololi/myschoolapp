<?php

namespace App\Http\Controllers\Matron;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Matron;
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

  		return back()->withSuccess('The password changed successfuly!');
    }
}
