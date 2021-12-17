<?php

namespace App\Http\Controllers\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStaffController extends Controller
{
    protected $meetingRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MeetingRepo $meetingRepo)
    {
        $this->middleware('auth:admin');
        $this->meetingRepo = $meetingRepo;
    }

    public function detachStaff(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$staff = $request->staff;
    	$meeting->staffs()->detach($staff);

    	return back()->withSuccess('The substaff detached from the meeting successfully');
    }
}
