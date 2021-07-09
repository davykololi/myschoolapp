<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
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
    	$stream = Stream::findOrFail($id);
    	$meeting = $request->meeting;
    	$stream->meetings()->detach($meeting);

    	return back()->withSuccess('The meeting detached from the class successfully');
    }
}
