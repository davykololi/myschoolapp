<?php

namespace App\Http\Controllers\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachMeetingController extends Controller
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

    public function detachMeeting(Request $request,$id)
    {
    	$club = $this->clubRepo->getId($id);
    	$meeting = $request->meeting;
    	$club->meetings()->detach($meeting);

    	return back()->withSuccess('The meeting detached from the club successfully');
    }
}
