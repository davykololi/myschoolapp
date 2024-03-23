<?php

namespace App\Http\Controllers\Superadmin\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachMeetingController extends Controller
{
    protected $clubRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClubRepo $clubRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
        $this->clubRepo = $clubRepo;
    }

    public function attachDetachMeeting(Request $request,$id)
    {
    	$club = $this->clubRepo->getId($id);
    	$meetings = $request->meetings;
    	$club->meetings()->sync($meetings);

    	return back()->withSuccess('Done Successfully');
    }
}
