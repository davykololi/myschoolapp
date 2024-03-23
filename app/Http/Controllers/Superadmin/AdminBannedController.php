<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\AdminService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBannedController extends Controller
{
    protected $adminService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminService $adminService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->adminService = $adminService;
    }

    public function bann(Request $request, $id)
    {
        $admin = $this->adminService->getId($id);
        $admin->is_banned = true;
        $admin->save();

        return back()->withSuccess('The admin banned successfully');
    }

    public function unbann(Request $request, $id)
    {
        $admin = $this->adminService->getId($id);
        $admin->is_banned = false;
        $admin->save();

        return back()->withSuccess('The admin ban lifted up successfully');
    }
}
