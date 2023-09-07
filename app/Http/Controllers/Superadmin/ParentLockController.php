<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\ParentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentLockController extends Controller
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

    public function lock(Request $request, $id)
    {
        $parent = $this->parentService->getId($id);
        $parent->lock = "disabled";
        $parent->save();

        return back()->withSuccess('The parent details locked successfully');
    }

    public function unlock(Request $request, $id)
    {
        $parent = $this->parentService->getId($id);
        $parent->lock = "enabled";
        $parent->save();

        return back()->withSuccess('The parent details unlocked successfully');
    }
}
