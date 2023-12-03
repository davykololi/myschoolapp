<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\StaffService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffBannedController extends Controller
{
    protected $staffService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StaffService $staffService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
        $this->staffService = $staffService;
    }

    public function bann(Request $request, $id)
    {
        $staff = $this->staffService->getId($id);
        $staff->is_banned = true;
        $staff->save();

        return back()->withSuccess('The sub staff banned successfully');
    }

    public function unbann(Request $request, $id)
    {
        $staff = $this->staffService->getId($id);
        $staff->is_banned = false;
        $staff->save();

        return back()->withSuccess('The sub staff ban lifted up successfully');
    }
}
