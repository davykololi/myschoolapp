<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\SubordinateService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubordinateBannedController extends Controller
{
    protected $subordinateService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubordinateService $subordinateService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->subordinateService = $subordinateService;
    }

    public function bann(Request $request, $id)
    {
        $subordinate = $this->subordinateService->getId($id);
        $subordinate->is_banned = true;
        $subordinate->save();

        return back()->withSuccess($subordinate->user->salutation." ".$subordinate->user->full_name." ".'banned successfully');
    }

    public function unbann(Request $request, $id)
    {
        $subordinate = $this->subordinateService->getId($id);
        $subordinate->is_banned = false;
        $subordinate->save();

        return back()->withSuccess($subordinate->user->salutation." ".$subordinate->user->full_name." ".'ban lifted up successfully');
    }
}
