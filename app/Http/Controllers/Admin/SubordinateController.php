<?php

namespace App\Http\Controllers\Admin;

use App\Services\SubordinateService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubordinateController extends Controller
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
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->subordinateService = $subordinateService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subordinates = $this->subordinateService->all();

        return view('admin.staffs.index',compact('subordinates'));
    }
}
