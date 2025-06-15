<?php

namespace App\Http\Controllers\Admin\Stream;

use App\Models\Stream;
use App\Models\Assignment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachAssignmentToStreamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('role:admin');
        $this->middleware('admin-banned');
        $this->middleware('checktwofa');
    }
    public function attachAssignmentToStream(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$assignments = $request->assignments;
        if(is_null($assignments)){
           return back()->withError('Please ensure you atleast select an assignment or assignments before you proceed!'); 
        }
    	$stream->assignments()->syncWithoutDetaching($assignments);

    	return back()->withSuccess('Successfully Done');
    }
}
