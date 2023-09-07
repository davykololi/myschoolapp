<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
use App\Models\Lesson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachLessonController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('banned');
    }

    public function detachLesson(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$lesson = $request->lesson;
    	$stream->lessons()->detach($lesson);

    	return back()->withSuccess('The lesson detached from the class successfully');
    }
}
