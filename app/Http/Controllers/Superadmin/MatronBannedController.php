<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\MatronService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatronBannedController extends Controller
{
    protected $matronService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MatronService $matronService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
        $this->matronService = $matronService;
    }

    public function bann(Request $request, $id)
    {
        $matron = $this->matronService->getId($id);
        $matron->is_banned = true;
        $matron->save();

        return back()->withSuccess('The matron banned successfully');
    }

    public function unbann(Request $request, $id)
    {
        $matron = $this->matronService->getId($id);
        $matron->is_banned = false;
        $matron->save();

        return back()->withSuccess('The matron ban lifted up successfully');
    }
}
