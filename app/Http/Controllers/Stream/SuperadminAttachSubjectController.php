<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperadminAttachSubjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }

    public function attachSubject(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$subjects = $request->subjects;
    	$stream->subjects()->sync($subjects);

    	return back()->withSuccess('The subject(s) attached to the stream successfully');
    }
}
