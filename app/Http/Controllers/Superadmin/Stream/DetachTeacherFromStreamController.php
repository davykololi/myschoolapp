<?php

namespace App\Http\Controllers\Superadmin\Stream;

use App\Models\Teacher;
use App\Models\Stream;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachTeacherFromStreamController extends Controller
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
    public function detachTeacherFromStream(Request $request,$id)
    {
        $stream = Stream::findOrFail($id);
        $teachers = $request->teachers;
        if(is_null($teachers)){
           return back()->withErrors('Please ensure you atleast select a teacher or teachers before you proceed!'); 
        }
        $stream->teachers()->detach($teachers);

        return back()->withSuccess('Done Successfully');
    }
}
