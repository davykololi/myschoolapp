<?php

namespace App\Http\Controllers\Dormitory;

use App\Models\Dormitory;
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
    	$dormitory = Dormitory::findOrFail($id);
    	$meeting = $request->meeting;
    	$dormitory->meetings()->detach($meeting);

    	return back()->withSuccess('The meeting detached from the dormitory successfully');
    }
}
