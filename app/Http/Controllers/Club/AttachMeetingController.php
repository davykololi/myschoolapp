<?php

namespace App\Http\Controllers\Club;

use App\Repositories\ClubRepository as ClubRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachMeetingController extends Controller
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

    public function attachMeeting(Request $request,$id)
    {
    	$club = $this->clubRepo->getId($id);
    	$meetings = $request->meetings;
    	$club->meetings()->sync($meetings);

    	return back()->withSuccess('The meetings attached to the club successfully');
    }
}
