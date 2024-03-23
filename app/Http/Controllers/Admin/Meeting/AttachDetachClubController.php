<?php

namespace App\Http\Controllers\Admin\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachClubController extends Controller
{
    protected $meetingRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MeetingRepo $meetingRepo)
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
        $this->meetingRepo = $meetingRepo;
    }
    public function attachDetachClub(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$clubs = $request->clubs;
    	$meeting->clubs()->sync($clubs);

    	return back()->withSuccess('Done Successfully');
    }
}
