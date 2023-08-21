<?php

namespace App\Http\Controllers\Admin;

use App\Services\StaffService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    protected $staffService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StaffService $staffService)
    {
        $this->middleware('auth:admin');
        $this->middleware('admin2fa');
        $this->staffService = $staffService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $staffs = $this->staffService->all();

        return view('admin.staffs.index',compact('staffs'));
    }
}
