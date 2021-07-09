<?php

namespace App\Http\Controllers\Library;

use App\Models\Library;
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
    	$library = Library::findOrFail($id);
    	$meeting = $request->meeting;
    	$library->meetings()->attach($meeting);

    	return back()->withSuccess('The meeting attached to the library successfully');
    }
}
