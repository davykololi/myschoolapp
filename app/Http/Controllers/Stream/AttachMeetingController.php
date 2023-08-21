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
    	$meetings = $request->meetings;
    	$stream->meetings()->attach($meetings);

    	return back()->withSuccess('The meetings attached to the class successfully');
    }
}
