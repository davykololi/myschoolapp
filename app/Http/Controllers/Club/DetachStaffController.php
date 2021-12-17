<?php

namespace App\Http\Controllers\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStaffController extends Controller
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

    public function detachStaff(Request $request,$id)
    {
    	$club = $this->clubRepo->getId($id);
    	$staff = $request->staff;
    	$club->staffs()->detach($staff);

    	return back()->withSuccess('The substaff detached from the club successfully');
    }
}
