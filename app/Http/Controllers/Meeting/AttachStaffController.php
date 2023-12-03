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
        $this->middleware('banned');
        $this->meetingRepo = $meetingRepo;
    }

    public function attachStaff(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$staffs = $request->staffs;
    	$meeting->staffs()->sync($staffs);

    	return back()->withSuccess('The substaffs attached to the meeting successfully');
    }
}
