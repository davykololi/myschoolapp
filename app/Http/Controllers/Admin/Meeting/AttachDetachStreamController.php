<?php

namespace App\Http\Controllers\Admin\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachStreamController extends Controller
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

    public function attachDetachStream(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$streams = $request->streams;
    	$meeting->streams()->sync($streams);

    	return back()->withSuccess('Done Successfully');
    }
}
