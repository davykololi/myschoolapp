<?php

namespace App\Http\Controllers\Superadmin\Stream;

use App\Models\Stream;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachDetachSubjectController extends Controller
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

    public function attachDetachSubject(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$subjects = $request->subjects;
    	$stream->subjects()->sync($subjects);

    	return back()->withSuccess('Done Successfully');
    }
}
