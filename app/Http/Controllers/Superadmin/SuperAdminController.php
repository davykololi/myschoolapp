<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Services\TermService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected TermService $termService)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->termService = $termService;
    }

    public function index()
    {
        $user = Auth::user();
        if($user->hasRole('superadmin')){
           return view('superadmin.superadmin'); 
        }
    }

    public function currentTerm($id)
    {
        $term = $this->termService->getId($id);
        $term->status = 1;
        $term->save();

        return back()->withSuccess($term->name." "."updated successfully as current term");
    }

    public function reservedTerm($id)
    {
        $term = $this->termService->getId($id);
        $term->status = 0;
        $term->save();

        return back()->withSuccess($term->name." "."updated successfully as reserved term");
    }
}
