<?php

namespace App\Http\Controllers\Superadmin;

use App\Services\ParentService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function parents()
    {
        //
        $parents = $this->parentService->paginate();
        
        return view('superadmin.parents.parents',compact('parents'));
    }
}
