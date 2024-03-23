<?php

namespace App\Http\Controllers\Superadmin\Teacher;

use App\Models\Teacher;
use App\Models\Stream;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachStreamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
        $this->middleware('checktwofa');
    }
    public function attachDetachStream(Request $request,$id)
    {
    	$teacher = Teacher::findOrFail($id);
    	$streams = $request->streams;
    	$teacher->streams()->sync($streams);

    	return back()->withSuccess('Done Successfully');
    }

}
