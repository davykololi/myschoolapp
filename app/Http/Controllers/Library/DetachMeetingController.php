<?php

namespace App\Http\Controllers\Library;

use App\Models\Library;
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
    	$library = Library::findOrFail($id);
    	$meeting = $request->meeting;
    	$library->meetings()->detach($meeting);

    	return back()->withSuccess('The meeting detached from the library successfully');
    }
}
