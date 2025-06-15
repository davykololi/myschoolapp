<?php

namespace App\Http\Controllers\Librarian\Impersonated;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrarianImpersonationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:librarian');
        $this->middleware('librarian-banned');
        $this->middleware('checktwofa');
    }

    public function impersonateLeave()
    {
        Auth::user()->leaveImpersonation();

        return redirect('superadmin/dashboard')->withSuccess(ucwords('Whoo!, You have left impersonation'));
    }
}
