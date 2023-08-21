<?php

namespace App\Http\Controllers\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStaffController extends Controller
{
    protected $clubRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClubRepo $clubRepo)
    {
        $this->middleware('auth:admin');
        $this->clubRepo = $clubRepo;
    }

    public function attachStaff(Request $request,$id)
    {
    	$club = $this->clubRepo->getId($id);
    	$staffs = $request->staffs;
    	$club->staffs()->attach($staffs);

    	return back()->withSuccess('The substaffs attached to the club successfully');
    }
}
