<?php

namespace App\Http\Controllers\Parent\Impersonated;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentImpersonationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:parent');
        $this->middleware('parent-banned');
        $this->middleware('checktwofa');
    }

    public function impersonateLeave()
    {
        Auth::user()->leaveImpersonation();

        return redirect('superadmin/dashboard')->withSuccess(ucwords('Whoo!, You have left impersonation'));
    }
}
