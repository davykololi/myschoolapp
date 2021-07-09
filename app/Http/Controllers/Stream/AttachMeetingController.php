<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachMeetingController extends Controller
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
    public function attachMeeting(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$meeting = $request->meeting;
    	$stream->meetings()->attach($meeting);

    	return back()->withSuccess('The meeting attached to the class successfully');
    }
}
