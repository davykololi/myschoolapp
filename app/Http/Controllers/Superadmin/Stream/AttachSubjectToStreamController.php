<?php

namespace App\Http\Controllers\Superadmin\Stream;

use App\Models\Stream;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachSubjectToStreamController extends Controller
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

    public function attachSubjectToStream(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$subjects = $request->subjects;
        if(is_null($subjects)){
            return back()->withErrors('Please select atleast one or more subjects before you proceed!');
        }
    	$stream->subjects()->syncWithoutDetaching($subjects);

    	return back()->withSuccess('Done Successfully');
    }
}
