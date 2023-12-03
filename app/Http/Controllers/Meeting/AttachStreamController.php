<?php

namespace App\Http\Controllers\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStreamController extends Controller
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

    public function attachStream(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$streams = $request->streams;
    	$meeting->streams()->sync($streams);

    	return back()->withSuccess('The streams attached to the meeting successfully');
    }
}
