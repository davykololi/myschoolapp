<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meeting;
use App\Models\Stream;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachStreamController extends Controller
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

    public function detachStream(Request $request,$id)
    {
    	$meeting = Meeting::findOrFail($id);
    	$stream = $request->stream;
    	$meeting->streams()->detach($stream);

    	return back()->withSuccess('The class detached from the meeting successfully');
    }
}
