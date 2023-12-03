<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\ParentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentBannedController extends Controller
{
    protected $parentService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ParentService $parentService)
    {
        $this->middleware('auth:superadmin');
        $this->middleware('banned');
        $this->middleware('superadmin2fa');
        $this->parentService = $parentService;
    }

    public function bann(Request $request, $id)
    {
        $parent = $this->parentService->getId($id);
        $parent->is_banned = true;
        $parent->save();

        return back()->withSuccess('The parent banned successfully');
    }

    public function unbann(Request $request, $id)
    {
        $parent = $this->parentService->getId($id);
        $parent->is_banned = false;
        $parent->save();

        return back()->withSuccess('The parent ban lifted up successfully');
    }
}
