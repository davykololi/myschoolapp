<?php

namespace App\Http\Controllers\Admin\Stream;

use App\Models\Stream;
use App\Models\Meeting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachMeetingFromStreamController extends Controller
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
    public function detachMeetingFromStream(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$meetings = $request->meetings;
        if(is_null($meetings)){
            return back()->withError('Please select a meeting or meetings before you proceed!');
        }
    	$stream->meetings()->detach($meetings);

    	return back()->withSuccess('Done Successfully');
    }
}
