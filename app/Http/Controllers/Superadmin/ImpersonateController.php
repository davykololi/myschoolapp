<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\User;
use Session;
use App\Models\UserEmailCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImpersonateController extends Controller
{
    //
    public function impersonate($id)
    {
    	if($id != ''){
    		$user = User::find($id);
    		Auth::user()->impersonate($user);
            toastr()->success(ucwords('Whoo!, You are now impersonating'." ".$user->full_name.'!'));

            return redirect('/login');
        }
    }

    public function impersonateLeave()
    {
    	Auth::user()->leaveImpersonation();
        toastr()->success(ucwords('Left impersonation zone successfully'));

    	return redirect('/login');
    }
}
