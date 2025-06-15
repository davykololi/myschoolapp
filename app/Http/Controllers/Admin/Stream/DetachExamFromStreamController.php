<?php

namespace App\Http\Controllers\Admin\Stream;

use App\Models\Stream;
use App\Models\Exam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachExamFromStreamController extends Controller
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
    public function detachExamFromStream(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$exams = $request->exams;
        if(is_null($exams)){
            returb back()->withError('Please select an exam or exams before you proceed!');
        }
    	$stream->exams()->detach($exams);

    	return back()->withSuccess('Done Successfully');
    }
}
