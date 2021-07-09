<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
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
    	$teacher = Teacher::findOrFail($id);
    	$stream = $request->stream;
    	$teacher->streams()->detach($stream);

    	return back()->withSuccess('The class detached from the teacher successfully');
    }
}
