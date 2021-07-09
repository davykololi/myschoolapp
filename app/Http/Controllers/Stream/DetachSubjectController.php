<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachSubjectController extends Controller
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

    public function detachSubject(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$subject = $request->subject;
    	$stream->subjects()->detach($subject);

    	return back()->withSuccess('The subject detached from the class successfully');
    }
}
