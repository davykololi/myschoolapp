<?php

namespace App\Http\Controllers\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetachTeacherController extends Controller
{
    protected $meetingRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->meetingRepo = $meetingRepo;
    }

    public function detachTeacher(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$teacher = $request->teacher;
    	$meeting->teachers()->detach($teacher);

    	return back()->withSuccess('The teacher detached from the meeting successfully');
    }
}
