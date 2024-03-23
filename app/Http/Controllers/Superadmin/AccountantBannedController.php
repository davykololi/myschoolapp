<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\AccountantService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountantBannedController extends Controller
{
    protected $accountantService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AccountantService $accountantService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->accountantService = $accountantService;
    }

    public function bann(Request $request, $id)
    {
        $accountant = $this->accountantService->getId($id);
        $accountant->is_banned = true;
        $accountant->save();

        return back()->withSuccess('The accountant banned successfully');
    }

    public function unbann(Request $request, $id)
    {
        $accountant = $this->accountantService->getId($id);
        $accountant->is_banned = false;
        $accountant->save();

        return back()->withSuccess('The accountant ban lifted up successfully');
    }
}
