<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
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
        $this->middleware('teacher2fa');
    }
    public function attachStream(Request $request,$id)
    {
    	$teacher = Teacher::findOrFail($id);
    	$streams = $request->streams;
    	$teacher->streams()->sync($streams);

    	return back()->withSuccess('The class streams attached to the teacher successfully');
    }

}
