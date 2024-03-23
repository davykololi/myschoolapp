<?php

namespace App\Http\Controllers\Admin\Stream;

use App\Models\Stream;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachMeetingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }
    public function attachDetachMeeting(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$meetings = $request->meetings;
    	$stream->meetings()->attach($meetings);

    	return back()->withSuccess('Done Successfully');
    }
}
