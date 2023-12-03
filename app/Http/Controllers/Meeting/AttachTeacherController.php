<?php

namespace App\Http\Controllers\Meeting;

use App\Repositories\MeetingRepository as MeetingRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttachTeacherController extends Controller
{
    protected $meetingRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MeetingRepo $meetingRepo)
    {
        $this->middleware('auth:admin');
        $this->middleware('banned');
        $this->meetingRepo = $meetingRepo;
    }
    public function attachTeacher(Request $request,$id)
    {
    	$meeting = $this->meetingRepo->getId($id);
    	$teachers = $request->teachers;
    	$meeting->teachers()->sync($teachers);

    	return back()->withSuccess('The teachers attached to the meeting successfully');
    }
}
