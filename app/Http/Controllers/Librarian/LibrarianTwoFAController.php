<?php

namespace App\Http\Controllers\Librarian;

use Auth;
use Session;
use App\Models\UserEmailCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrarianTwoFAController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:librarian');
        $this->middleware('banned');
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

        return view('librarian.2fa');
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
  
        $find = UserEmailCode::where('librarian_id', auth()->user()->id)
                        ->where('code', $request->code)
                        ->where('updated_at', '>=', now()->subMinutes(1))
                        ->first();
  
        if (!is_null($find)) {
            Session::put('user_2fa', auth()->user()->id);

            return redirect()->intended(route('librarian.dashboard'));
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
