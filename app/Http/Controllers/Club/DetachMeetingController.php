<?php

namespace App\Http\Controllers\Club;

use App\Models\Club;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachMeetingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function detachMeeting(Request $request,$id)
    {
    	$club = Club::findOrFail($id);
    	$meeting = $request->meeting;
    	$club->meetings()->detach($meeting);

    	return back()->withSuccess('The meeting detached from the club successfully');
    }
}
