<?php

namespace App\Http\Controllers\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStaffController extends Controller
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

    public function attachStaff(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$staff = $request->staff;
    	$meeting->staffs()->attach($staff);

    	return back()->withSuccess('The substaff attached to the meeting successfully');
    }
}
