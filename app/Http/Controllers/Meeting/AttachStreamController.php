<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meeting;
use App\Models\Stream;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachStreamController extends Controller
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

    public function attachStream(Request $request,$id)
    {
    	$meeting = Meeting::findOrFail($id);
    	$streamId = $request->stream;
    	$meeting->streams()->attach($streamId);

    	return back()->withSuccess('The class stream attached to the meeting successfully');
    }
}
