<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Models\User;
use Session;
use App\Models\UserEmailCode;
use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImpersonateController extends Controller
{
    //
    public function impersonate($id)
    {
    	if($id != ''){
    		$user = User::find($id);

            $admin = RolesEnum::ADMIN->value;
            $teacher = RolesEnum::TEACHER->value;
            $student = RolesEnum::STUDENT->value;
            $parent = RolesEnum::MYPARENT->value;
            $librarian = RolesEnum::LIBRARIAN->value;
            $accountant = RolesEnum::ACCOUNTANT->value;
            $matron = RolesEnum::MATRON->value;
            $subordinate = RolesEnum::SUBORDINATE->value;

            $successInfo = 'Whoo!, You are now impersonating'." ".$user->full_name.'!';

            if(Auth::user()->hasRole('superadmin') && ($user->hasRole($admin))){
                Auth::user()->impersonate($user);
                return redirect('/'.$admin.'/dashboard')->withSuccess(ucwords($successInfo));
            }

            if(Auth::user()->hasRole('superadmin') && ($user->hasRole($teacher))){
                Auth::user()->impersonate($user);
                return redirect('/'.$teacher.'/dashboard')->withSuccess(ucwords($successInfo));
            }

            if(Auth::user()->hasRole('superadmin') && ($user->hasRole($student))){
                Auth::user()->impersonate($user);
                return redirect('/'.$student.'/dashboard')->withSuccess(ucwords($successInfo));
            }

            if(Auth::user()->hasRole('superadmin') && ($user->hasRole($parent))){
                Auth::user()->impersonate($user);
                return redirect('/'.$parent.'/dashboard')->withSuccess(ucwords($successInfo));
            }

            if(Auth::user()->hasRole('superadmin') && ($user->hasRole($librarian))){
                Auth::user()->impersonate($user);
                return redirect('/'.$librarian.'/dashboard')->withSuccess(ucwords($successInfo));
            }

            if(Auth::user()->hasRole('superadmin') && ($user->hasRole($accountant))){
                Auth::user()->impersonate($user);
                return redirect('/'.$accountant.'/dashboard')->withSuccess(ucwords($successInfo));
            }

            if(Auth::user()->hasRole('superadmin') && ($user->hasRole($matron))){
                Auth::user()->impersonate($user);
                return redirect('/'.$matron.'/dashboard')->withSuccess(ucwords($successInfo));
            }

            if(Auth::user()->hasRole('superadmin') && ($user->hasRole($subordinate))){
                Auth::user()->impersonate($user);
                return redirect('/'.$subordinate.'/dashboard')->withSuccess(ucwords($successInfo));
            }

            return redirect('/login')->withSuccess(ucwords('Whoo!, You are now impersonating'." ".$user->full_name.'!'));
        }
    }
}
