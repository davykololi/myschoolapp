<?php

namespace App\Http\Controllers\Subordinate\Impersonated;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubordinateImpersonationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:subordinate');
        $this->middleware('subordinate-banned');
        $this->middleware('checktwofa');
    }

    public function impersonateLeave()
    {
        Auth::user()->leaveImpersonation();

        return redirect('superadmin/dashboard')->withSuccess(ucwords('Whoo!, You have left impersonation'));
    }
}
