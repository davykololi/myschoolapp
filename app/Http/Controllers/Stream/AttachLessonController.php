<?php

namespace App\Http\Controllers\Stream;

use App\Models\Stream;
use App\Models\Lesson;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachLessonController extends Controller
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
    public function attachLesson(Request $request,$id)
    {
    	$stream = Stream::findOrFail($id);
    	$lesson = $request->lesson;
    	$stream->lessons()->attach($lesson);

    	return back()->withSuccess('The lesson attached to the class successfully');
    }
}
