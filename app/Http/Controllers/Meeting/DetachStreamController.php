<?php

namespace App\Http\Controllers\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStreamController extends Controller
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

    public function detachStream(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$stream = $request->stream;
    	$meeting->streams()->detach($stream);

    	return back()->withSuccess('The class detached from the meeting successfully');
    }
}
