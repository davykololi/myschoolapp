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
        $this->meetingRepo = $meetingRepo;
    }

    public function attachStream(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$streamId = $request->stream;
    	$meeting->streams()->attach($streamId);

    	return back()->withSuccess('The class stream attached to the meeting successfully');
    }
}
