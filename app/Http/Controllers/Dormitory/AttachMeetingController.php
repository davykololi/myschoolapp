<?php

namespace App\Http\Controllers\Dormitory;

use App\Models\Dormitory;
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
    	$dormitory = Dormitory::findOrFail($id);
    	$meeting = $request->meeting;
    	$dormitory->meetings()->attach($meeting);

    	return back()->withSuccess('The meeting attached to the dormitory successfully');
    }
}
